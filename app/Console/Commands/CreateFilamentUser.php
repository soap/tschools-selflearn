<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Filament\Commands\MakeUserCommand;
use Illuminate\Support\Facades\Hash;

class CreateFilamentUser extends MakeUserCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filament-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates custom filament user (split Name to First and Last Name)';


    protected function getUserData(): array
    {
        return [
            'first_name' => $this->validateInput(fn () => $this->ask('First Name'), 'first_name', ['required']),
            'last_name' => $this->validateInput(fn () => $this->ask('Last Name'), 'last_name', ['required']),
            'email' => $this->validateInput(fn () => $this->ask('Email address'), 'email', ['required', 'email', 'unique:' . $this->getUserModel()]),
            'password' => Hash::make($this->validateInput(fn () => $this->secret('Password'), 'password', ['required', 'min:8'])),
        ];
    }
}
