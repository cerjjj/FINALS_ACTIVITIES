<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ImageProcessor
{
    public static function storeSquare(UploadedFile $upload, string $directory, int $edge): string
    {
        if (! extension_loaded('gd')) {
            throw new RuntimeException('Enable the PHP GD extension to process uploaded images.');
        }

        $source = @imagecreatefromstring(file_get_contents($upload->getRealPath()));
        if ($source === false) {
            throw new RuntimeException('The uploaded image could not be decoded.');
        }

        $source = self::orientJpeg($source, $upload);
        $width = imagesx($source);
        $height = imagesy($source);
        $cropSize = min($width, $height);
        $cropX = (int) floor(($width - $cropSize) / 2);
        $cropY = (int) floor(($height - $cropSize) / 2);

        $thumbnail = imagecreatetruecolor($edge, $edge);
        $white = imagecolorallocate($thumbnail, 255, 255, 255);
        imagefill($thumbnail, 0, 0, $white);
        imagecopyresampled($thumbnail, $source, 0, 0, $cropX, $cropY, $edge, $edge, $cropSize, $cropSize);

        ob_start();
        imagejpeg($thumbnail, null, 86);
        $prepared = ob_get_clean();

        imagedestroy($thumbnail);
        imagedestroy($source);

        if ($prepared === false) {
            throw new RuntimeException('The image thumbnail could not be encoded.');
        }

        $path = trim($directory, '/').'/'.Str::uuid().'.jpg';
        if (! Storage::disk('public')->put($path, $prepared)) {
            throw new RuntimeException('The prepared image could not be saved.');
        }

        return $path;
    }

    private static function orientJpeg(\GdImage $image, UploadedFile $upload): \GdImage
    {
        if (! in_array(strtolower((string) $upload->getClientOriginalExtension()), ['jpg', 'jpeg'], true)) {
            return $image;
        }

        $metadata = @exif_read_data($upload->getRealPath());
        $orientation = (int) ($metadata['Orientation'] ?? 1);

        if (in_array($orientation, [2, 4, 5, 7], true)) {
            imageflip($image, in_array($orientation, [2, 5], true) ? IMG_FLIP_HORIZONTAL : IMG_FLIP_VERTICAL);
        }

        $degrees = match ($orientation) {
            3, 4 => 180,
            5, 6 => -90,
            7, 8 => 90,
            default => 0,
        };

        if ($degrees !== 0) {
            $rotated = imagerotate($image, $degrees, 0);
            if ($rotated !== false) {
                imagedestroy($image);
                return $rotated;
            }
        }

        return $image;
    }
}
