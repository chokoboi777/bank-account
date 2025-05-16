<?php

use App\BankAccount;
use App\Exception\InvalidAmountException;
use App\Exception\InsufficientFundsException;

function runTests()
{
    try {
        // Тест 1: Отрицательный начальный баланс
        $acc1 = new BankAccount(-100);
        echo "Тест 1 провален\n";
    } catch (InvalidAmountException $e) {
        echo "Тест 1 пройден: " . $e->getMessage() . "\n";
    }

    try {
        // Тест 2: Внесение нуля
        $acc2 = new BankAccount(100);
        $acc2->deposit(0);
        echo "Тест 2 провален\n";
    } catch (InvalidAmountException $e) {
        echo "Тест 2 пройден: " . $e->getMessage() . "\n";
    }

    try {
        // Тест 3: Снятие больше баланса
        $acc3 = new BankAccount(100);
        $acc3->withdraw(150);
        echo "Тест 3 провален\n";
    } catch (InsufficientFundsException $e) {
        echo "Тест 3 пройден: " . $e->getMessage() . "\n";
    }

    try {
        // Тест 4: Успешное снятие
        $acc4 = new BankAccount(500);
        $acc4->withdraw(200);
        if ($acc4->getBalance() == 300) {
            echo "Тест 4 пройден\n";
        } else {
            echo "Тест 4 провален\n";
        }
    } catch (Exception $e) {
        echo "Тест 4 провален: " . $e->getMessage() . "\n";
    }
}

echo "\n=== Тестирование ===\n";
runTests();