UPGRADE FROM 1.6 to 1.7
=======================


В Директ API c 28 июня 2017 г в сервисе Campaigns отключена поддержка стратегий LOWEST_COST, LOWEST_COST_GUARANTEE, LOWEST_COST_PREMIUM (для всех типов кампаний). Если одно из этих значений передать в параметре BiddingStrategyType структуры Search, возвращается ошибка.  
