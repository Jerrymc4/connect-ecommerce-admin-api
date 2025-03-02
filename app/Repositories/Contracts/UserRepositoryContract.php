<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


interface UserRepositoryContract {
  public function all(): Collection;
  public function findById(int $id): ?User;
  public function create(array $data): User;
  public function update(int $id, array $data): bool;
  public function delete(int $id): bool;
  
}