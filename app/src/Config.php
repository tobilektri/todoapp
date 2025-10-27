<?php declare(strict_types=1);
namespace App;

/**
 * Simple configuration provider for the app.
 */
class Config {
    private function __construct(
        private readonly string $dbHost,
        private readonly int $dbPort,
        private readonly string $dbName,
        private readonly string $dbUser,
        private readonly string $dbPass
    ) {}

    public static function create(): self {
        $ENV = parse_ini_file(".env");
        return new self(
            $ENV["DB_HOST"],
            $ENV["DB_PORT"],
            $ENV["DB_NAME"],
            $ENV["DB_USER"],
            $ENV["DB_PASS"]
        );
    }

    public function dbHost(): string { return $this->dbHost; }
    public function dbPort(): int { return $this->dbPort; }
    public function dbName(): string { return $this->dbName; }
    public function dbUser(): string { return $this->dbUser; }
    public function dbPass(): string { return $this->dbPass; }
}
