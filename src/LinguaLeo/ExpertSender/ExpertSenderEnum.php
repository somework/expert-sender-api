<?php

namespace LinguaLeo\ExpertSender;

final class ExpertSenderEnum
{
    const string TYPE_BOOLEAN = 'boolean';
    const string TYPE_STRING = 'string';
    const string TYPE_INTEGER = 'int';
    const string TYPE_DATE = 'date';
    const string TYPE_DATE_TIME = 'dateTime';

    const string OPERATOR_EQUALS = 'Equals';
    const string OPERATOR_GREATER = 'Greater';
    const string OPERATOR_LOWER = 'Lower';
    const string OPERATOR_LIKE = 'Like';

    const string ORDER_ASCENDING = 'Ascending';
    const string ORDER_DESCENDING = 'Descending';

    const string MODE_ADD_AND_UPDATE = 'AddAndUpdate';
    const string MODE_ADD_AND_REPLACE = 'AddAndReplace';
    const string MODE_ADD_AND_IGNORE = 'AddAndIgnore';
    const string MODE_IGNORE_AND_UPDATE = 'IgnoreAndUpdate';
    const string MODE_IGNORE_AND_REPLACE = 'IgnoreAndReplace';

    const string URL_SUBSCRIBERS = 'Subscribers';
    const string URL_TRIGGER_PATTERN = 'Triggers/%s';
    const string URL_TRANSACTIONAL_PATTERN = 'Transactionals/%s';
    const string URL_SYSTEM_TRANSACTIONAL_PATTERN = 'SystemTransactionals/%s';
    const string URL_ADD_TABLE_ROW = 'DataTablesAddRow';
    const string URL_DELETE_TABLE_ROW = 'DataTablesDeleteRow';
    const string URL_UPDATE_TABLE_ROW = 'DataTablesUpdateRow';
    const string URL_GET_TABLE_DATA = 'DataTablesGetData';
    const string URL_GET_LISTS = 'Lists';

    const string MODE_SUBSCRIBERS_SHORT = 'Short';
    const string MODE_SUBSCRIBERS_LONG = 'Long';
    const string MODE_SUBSCRIBERS_FULL = 'Full';
    const string MODE_SUBSCRIBERS_EVENTS_HISTORY = 'EventsHistory';

    const string DATE_TIME_FORMAT = 'Y-m-d\TH:i:s';
    const string DATE_TIME_TIMEZONE = 'Europe/Moscow';

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [self::TYPE_BOOLEAN, self::TYPE_STRING, self::TYPE_INTEGER, self::TYPE_DATE, self::TYPE_DATE_TIME];
    }

    /**
     * @return array
     */
    public static function getOperators()
    {
        return [self::OPERATOR_EQUALS, self::OPERATOR_GREATER, self::OPERATOR_LOWER, self::OPERATOR_LIKE];
    }

    /**
     * @return array
     */
    public static function getOrders()
    {
        return [self::ORDER_ASCENDING, self::ORDER_DESCENDING];
    }

    /**
     * @return array
     */
    public static function getModes()
    {
        return [
            self::MODE_ADD_AND_UPDATE,
            self::MODE_ADD_AND_REPLACE,
            self::MODE_ADD_AND_IGNORE,
            self::MODE_IGNORE_AND_UPDATE,
            self::MODE_IGNORE_AND_REPLACE,
        ];
    }

    public static function getSubscribersGetModes()
    {
        return [
            self::MODE_SUBSCRIBERS_SHORT,
            self::MODE_SUBSCRIBERS_LONG,
            self::MODE_SUBSCRIBERS_FULL,
            self::MODE_SUBSCRIBERS_EVENTS_HISTORY,
        ];
    }
}
