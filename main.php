<?php

require_once 'vendor/autoload.php';

use App\BankAccount;
use App\Exception\InvalidAmountException;
use App\Exception\InsufficientFundsException;

try {
    $account = new BankAccount(1000.0);

    echo "Текущий баланс: " . $account->getBalance() . "\n";

    $account->deposit(500.0);
    echo "После пополнения: " . $account->getBalance() . "\n";

    $account->withdraw(200.0);
    echo "После снятия: " . $account->getBalance() . "\n";

    // Вызов исключения InsufficientFundsException
    $account->withdraw(2000.0);
} catch (InvalidAmountException | InsufficientFundsException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}