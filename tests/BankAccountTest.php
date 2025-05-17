<?php

use App\BankAccount;
use App\Exception\InvalidAmountException;
use App\Exception\InsufficientFundsException;

function runTests() {
    try {
        // Тест 1: Создание аккаунта с отрицательным балансом
        echo "Тест 1: ";
        $acc = new BankAccount(-100);
    } catch (InvalidAmountException $e) {
        echo "ОК — " . $e->getMessage() . "\n";
    }

    try {
        // Тест 2: Депозит с нулевой суммой
        echo "Тест 2: ";
        $acc = new BankAccount(100);
        $acc->deposit(0);
    } catch (InvalidAmountException $e) {
        echo "ОК — " . $e->getMessage() . "\n";
    }

    try {
        // Тест 3: Снятие больше баланса
        echo "Тест 3: ";
        $acc = new BankAccount(100);
        $acc->withdraw(150);
    } catch (InsufficientFundsException $e) {
        echo "ОК — " . $e->getMessage() . "\n";
    }

    try {
        // Тест 4: Корректное снятие
        echo "Тест 4: ";
        $acc = new BankAccount(100);
        $acc->withdraw(50);
        echo "ОК — Баланс: " . $acc->getBalance() . "\n";
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }

    try {
        // Тест 5: Несколько операций
        echo "Тест 5: ";
        $acc = new BankAccount(500);
        $acc->deposit(200);
        $acc->withdraw(300);
        echo "ОК — Итоговый баланс: " . $acc->getBalance() . "\n";
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "\n";
    }
}

runTests();
