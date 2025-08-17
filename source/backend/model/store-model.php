<?php

class StoreModel implements Model
{
    // Implemented Methods

    public static function all(): array
    {

        // TODO: Implement method logic
        $logoFiles = [
            'acer.png',
            'asus.png',
            'dell.png',
            'hp.png',
            'predator.png',
            'samsung.png',
        ];

        $stores = [];

        for ($i = 0; $i < 20; $i++) {
            $stores[] = new Store([
                'id' => bin2hex(random_bytes(8)),
                'name' => "Store " . ($i + 1),
                'description' => "This is a description for Brand " . ($i + 1),
                'logo' => IMAGE_PATH . 'brand logo' . DS . $logoFiles[$i % count($logoFiles)],
                'siteLink' => "https://brand" . ($i + 1) . ".com",
                'email' => "contact" . ($i + 1) . "@brand.com",
                'contact' => '+63 912 345 678' . $i,
                'location' => new Address([
                    'houseNumber' => rand(1, 100),
                    'street' => 'Street ' . chr(65 + $i % 26), // A, B, C...
                    'city' => 'City ' . ($i + 1),
                    'region' => 'NCR',
                    'postalCode' => 1000 + $i,
                    'country' => 'Philippines'
                ]),
                'collection' => new StoreCollection(['Back To School', 'Windows Essentials', 'PC Parts']),
                'productCount' => rand(10, 100),
                'followerCount' => rand(100, 10000),
                'isVerified' => (string)rand(0, 1),
                'createdAt' => (new DateTime())->modify("-{$i} days"),
            ]);
        }

        return $stores;
    }

    public static function create(array $data): Store
    {
        // TODO: Implement method logic
        return new Store();
    }

    public static function find($id): ?Store
    {
        // TODO: Implement method logic
        return null;
    }

    public function save(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function delete(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function fill(array $data): void
    {
        // TODO: Implement method logic
    }
}
