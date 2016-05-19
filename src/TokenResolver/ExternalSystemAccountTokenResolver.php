<?php

namespace eLama\DirectApiV5\TokenResolver;

use eLama\Ad\Account\ExternalSystemAccount\Direct\DirectAccount;
use eLama\Ad\Account\ExternalSystemAccount\Direct\DirectAccountRepository;
use eLama\Ad\Account\ExternalSystemAccount\Direct\DirectClientAccount;

class ExternalSystemAccountTokenResolver
{
    /** @var  DirectAccountRepository */
    private $repository;

    public function __construct(DirectAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $login
     * @return string
     * @throws \Exception
     */
    public function __invoke($login)
    {
        $account = $this->getAccountByLogin($login);

        return $account->getCredentials()->getToken();
    }

    /**
     * @param $login
     * @return DirectClientAccount
     */
    private function getAccountByLogin($login)
    {
        $account = $this->repository->findOneActiveByLogin($login);
        if ($account !== null) {
            return $account;
        }
        $directLogin = $this->stripDomain($login);
        $directEmail = $this->convertToEmail($login);
        $account = $this->repository->findOneActiveByLogin($directEmail);
        if ($account === null) {
            $account = $this->repository->findOneActiveByLogin($directLogin);
        }

        if ($account === null) {
            throw new \RuntimeException("Аккаунт с логином `{$login}` не найден");
        }

        $this->assertIsClientAccount($account);

        return $account;
    }

    private function stripDomain($login)
    {
        list($login) = explode('@', $login);

        return $login;
    }

    private function convertToEmail($login)
    {
        return $login . '@yandex.ru';
    }

    /**
     * @param DirectAccount $account
     */
    private function assertIsClientAccount(DirectAccount $account)
    {
        if (!$account instanceof DirectClientAccount) {
            throw new \RuntimeException("Аккаунт с логином `{$account->getExternalId()}` не является клиентским");
        }
    }

}
