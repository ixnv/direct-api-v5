<?php

namespace eLama\DirectApiV5;

final class WarningCode
{
    /**
     * Объект присутствует в запросе более одного раза
     */
    const OBJECT_IN_REQUEST_MORE_THAN_ONCE = 10000;

    /**
     * Объект уже остановлен.
     */
    const OBJECT_ALREADY_SUSPENDED = 10020;

    /**
     * Объект не остановлен.
     */
    const OBJECT_NOT_SUSPENDED = 10021;

    /**
     * Объект уже заархивирован.
     */
    const OBJECT_ALREADY_ARCHIVED = 10022;

    /**
     * Объект уже помечен как удаленный
     */
    const OBJECT_ALREADY_MARKED_AS_DELETED = 10025;

    /**
     * Указанная визитка дублирует ранее созданную визитку
     */
    const SPECIFIED_VCARD_DUPLICATES_PREVIOUSLY_CREATED_VCARD = 10100;

    /**
     * Указанный набор быстрых ссылок дублирует ранее созданный набор
     */
    const SPECIFIED_SET_OF_SITELINKS_DUPLICATES_PREVIOUSLY_CREATED_SET = 10120;

    /**
     * Ключевое слово уже существует
     */
    const KEYWORD_ALREADY_EXISTS = 10140;

    /**
     * Новое ключевое слово создано в результате обновления
     */
    const NEW_KEYWORD_CREATED_AS_RESULT_OF_UPDATING = 10141;

    /**
     * Ставка не будет применена
     */
    const BID_WONT_BE_APPLIED = 10160;

    /**
     * Приоритет не будет применен
     */
    const PRIORITY_WILL_NOT_BE_CHANGED = 10161;

    /**
     * Объявление уже остановлено
     */
    const AD_ALREADY_PAUSED = 10200;

    /**
     * Объявление не остановлено
     */
    const AD_NOT_PAUSED = 10201;

    /**
     * Объявление уже заархивировано
     */
    const AD_ALREADY_ARCHIVED = 10202;

    /**
     * Объявление не заархивировано
     */
    const AD_NOT_ARCHIVED = 10203;

    /**
     * Ключевое слово уже остановлено
     */
    const KEYWORD_ALREADY_STOPPED = 10240;

    /**
     * Ключевое слово не остановлено
     */
    const KEYWORD_NOT_STOPPED = 10241;

    /**
     * Условие нацеливания уже остановлено
     */
    const TARGETING_CONDITION_ALREADY_STOPPED = 10242;

    /**
     * Условие нацеливания не остановлено
     */
    const TARGETING_CONDITION_NOT_STOPPED = 10243;

    private function __construct()
    {
    }
}
