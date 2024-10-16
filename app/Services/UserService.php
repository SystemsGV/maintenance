<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserService
{
    /**
     * Store avatar if uploaded by user
     * otherwise attempt to fetch it via unavatar.io service
     */
    public static function storeOrFetchAvatar(User $user, ?UploadedFile $avatar): ?string
    {
        if ($avatar) {
            $filename = $user->id.'.'.$avatar->clientExtension();
            $avatar->storePubliclyAs('public/avatars', $filename);

            return "/storage/avatars/{$user->id}.jpg";
        } else {
            $filepath = storage_path("app/public/avatars/{$user->id}.jpg");

            try {
                $response = Http::timeout(20)
                    ->sink($filepath)
                    ->get("https://unavatar.io/{$user->email}?fallback=false");

                if ($response->successful()) {
                    return "/storage/avatars/{$user->id}.jpg";
                } else {
                    File::delete($filepath);

                    return null;
                }
            } catch (\Exception $e) {
                return null;
            }
        }
    }

    public static function storeOrFetchSignature(User $user, ?UploadedFile $signature): ?string
    {
        if ($signature) {
            $filename = strtolower(Str::ulid()).'.'.$signature->getClientOriginalExtension();
            $filepath = "signatures/{$user->id}/{$filename}";
            $signature->storeAs('public', $filepath);
            $manager = new ImageManager(new Driver());
            $manager->read(storage_path("app/public/{$filepath}"))
                ->resize(250, 250)
                ->save(storage_path("app/public/{$filepath}"));

            return "/storage/$filepath";
        } else {
            return null;
        }
    }

}
