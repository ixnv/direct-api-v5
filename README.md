История изменений API директа: 

В либу превносятся не все изменения из API, т.к. есть вещи, котоые не нужны и никем не используются. А те, что будут приниматься, будут вписываться в этот файл ниже.

**ПЕСОЧНИЦА**

На данный момент Директ не предоставляет возможности очищать песочницу по API. Поэтому, если так получилось, что интеграционные тесты были запущены в несколько потоков одновременно, и песочница поламалась, то необходимо идти в Директ и чистить песочницу вручную.

Для входа испольуем логин ra-trinet-add-dev-01. Пароль от него просим у Артура Гафарова или Никиты Красноярцева.

Идем на страницу https://direct.yandex.ru/registered/main.pl?cmd=apiSandboxSettings и жмем "Очистить Песочницу".


**CHANGELOG**

Изменение Директа (обновляющийся оригинал [здесь](https://tech.yandex.ru/direct/doc/changelog/index-docpage/))

- [] 15 августа 2017 г.
В методы сервиса Ads добавлен параметр Title2 для текстово-графических объявлений.
Изменены ограничения на количество символов в полях Title, Text для текстово-графических объявлений, в поле Text для динамических объявлений.
Внесены изменения в справочник ограничений. Рекомендуем получить обновленный справочник с помощью метода Dictionaries.get, указав в запросе имя справочника Constants.
- [] 7 августа 2017 г.
Отчет с типом SEARCH_QUERY_PERFORMANCE_REPORT теперь содержит статистику по запросам не только на поиске Яндекса, но и на поисковых площадках РСЯ. Для данного типа отчета также добавлена поддержка поля Placement.
- [ ] 7 августа 2017 г.
В сервисе Campaigns отключена поддержка настройки ENABLE_AUTOFOCUS в структуре Settings.
- [ ] 4 июля 2017 г.
Появилась поддержка видеодополнений для текстово-графических объявлений:
 В методы сервиса Ads добавлена структура VideoExtension.
 В сервис Reports добавлено значение VIDEO поля AdFormat.
Подробнее о том, как привязать и отвязать видеодополнение, см. в разделе Добавление визитки, изображения, быстрых ссылок, уточнений, видеодополнения.
- [x] 28 июня 2017 г.
В сервисе Campaigns отключена поддержка стратегий LOWEST_COST, LOWEST_COST_GUARANTEE, LOWEST_COST_PREMIUM (для всех типов кампаний). Если одно из этих значений передать в параметре BiddingStrategyTypeструктуры Search, возвращается ошибка.
- [ ] 22 июня 2017 г.
В сервисе Campaigns изменены настройки показов по дополнительным релевантным фразам для кампаний с типом «Текстово-графические объявления»:
 Параметр BudgetPercent структуры RelevantKeywords поддерживает любые целочисленные значения от 1 до 100.
 Параметр Mode структуры RelevantKeywords не поддерживается, переданное значение игнорируется.
 Настройка ENABLE_RELATED_KEYWORDS в структуре Settings не поддерживается.
В сервис Reports добавлены поля MatchedKeyword, Criterion, CriterionId.
- [ ] 20 июня 2017 г.
В сервис Bids добавлена поддержка 4-й позиции в спецразмещении: значение P14 в параметре Position массива AuctionBids, возвращаемого методом Bids.get, а также в параметре запроса Position метода Bids.setAuto.
- [ ] 3 мая 2017 г.
В сервис BidModifiers добавлена поддержка корректировок ставок по региону показа. Подробнее о корректировках...
- [ ] 17 апреля 2017 г.
Добавлен сервис KeywordsResearch для получения прогноза наличия показов по ключевым фразам.
- [ ] 17 апреля 2017 г.
В метод AdGroups.get добавлен параметр ответа RestrictedRegionIds.
- [ ] 21 марта 2017 г.
Добавлен сервис Reports для получения статистики.
- [ ] 6 марта 2017 г.
Добавлен сервис AgencyClients для управления клиентами агентства.
- [ ] 28 февраля 2017 г.
Появилась возможность таргетинга по интересам для рекламы мобильных приложений (см. раздел Таргетинг по интересам к мобильным приложениям):
 В методы сервиса AudienceTargets добавлен параметр InterestId.
 В метод Dictionaries.get добавлена возможность получать справочник интересов к категориям мобильных приложений.
 В метод Changes.checkDictionaries добавлен параметр ответа InterestsChanged.
- [ ] 14 февраля 2017 г.
Добавлена поддержка минус-фраз, содержащих до 7 слов:
 в сервисе AdGroups — в параметре группы объявлений NegativeKeywords;
 в сервисе Campaigns — в параметре кампании NegativeKeywords.
- [ ] 25 января 2017 г.
 Добавлена поддержка статуса «Мало показов»: в методы AdGroups.get, Keywords.get и Bids.get добавлен параметр запроса ServingStatuses и параметр ответа ServingStatus.
 В группах со статусом «Мало показов» отключена возможность получать следующие данные по ключевым фразам:
StatisticsSearch и StatisticsNetwork в методе Keywords.get;
CompetitorsBids, SearchPrices, ContextCoverage, AuctionBids, MinSearchPrice, CurrentSearchPrice в методе Bids.get.
- [ ] 26 декабря 2016 г.
В кампаниях со стратегией показа в сетях SERVING_OFF или NETWORK_DEFAULT отключена возможность получать массив ContextCoverage в методе Bids.get.
- [ ] 9 ноября 2016 г.
Добавлен сервис Clients для получения сведений о клиентах.
- [ ] 1 ноября 2016 г.
Добавлена поддержка новой валюты: белорусские рубли (BYN).
- [ ] 17 октября 2016 г.
Внимание! 
Для рекламодателей, работающих в у. е. и не осуществлявших оплату более года, доступ к аккаунту может быть приостановлен. В этом случае при попытке вызова методов API выдается ошибка 54, а в веб-интерфейсе недоступны никакие операции, кроме перевода в валюту.
Чтобы возобновить работу, переведите аккаунт в валюту оплаты. Для этого нажмите кнопку Перевести сейчас в веб-интерфейсе Директа. Подробнее о процедуре перевода читайте в помощи Директа: российские рубли, другая валюта.
- [ ] 13 октября 2016 г.
В методах сервиса Ads расширен набор возможных значений параметра Action (для рекламы мобильных приложений).
- [ ] 13 октября 2016 г.
Внесены изменения в справочник регионов. Рекомендуем получить обновленный справочник с помощью метода Dictionaries.get.
В частности, из справочника удалены регионы, перечисленные ниже:
 эти регионы больше нельзя указывать при создании и редактировании групп объявлений;
 в группах, где были указаны эти регионы, они автоматически заменены набором нижестоящих регионов;
 статистика по этим регионам отнесена к вышестоящим регионам.
Список регионов, которые были удалены
- [ ] 12 октября 2016 г.
Добавлено ограничение для ключевых фраз: длина каждого слова и минус-слова в ключевой фразе — не более 35 символов.
- [ ] 28 сентября 2016 г.
Добавлен сервис AudienceTargets для управления условиями нацеливания на аудиторию и сервис RetargetingLists для управления условиями подбора аудитории. Подробнее о нацеливании на аудиторию...
- [ ] 20 сентября 2016 г.
Ориентировочно через две-три недели будут внесены изменения в справочник регионов. После обновления справочника рекомендуем получить его заново с помощью метода Dictionaries.get.
В частности, из справочника будут удалены регионы, перечисленные ниже:
 эти регионы нельзя будет указывать при создании и редактировании групп объявлений;
 в группах, где указаны эти регионы, они будут автоматически заменены набором нижестоящих регионов;
 статистика по этим регионам будет отнесена к вышестоящим регионам.
Список регионов, которые будут удалены
- [ ] 8 сентября 2016 г.
В метод Ads.get добавлено значение PROJECT_DECLARATION параметра AdCategories.
- [ ] 6 сентября 2016 г.
В метод AdGroups.get добавлена возможность получать параметры групп динамических объявлений, для которых источником данных является фид.
- [ ] 22 августа 2016 г.
В сервис Ads добавлена поддержка графических объявлений. Подробнее о типах объявлений...
Добавлен сервис AdImages для управления изображениями. Сервис поддерживает размеры изображений для использования в графических объявлениях. Подробнее об изображениях...
- [ ] 11 августа 2016 г.
В метод Keywords.get добавлен параметр запроса ModifiedSince.
- [ ] 2 июня 2016 г.
В сервисе BidModifiers изменены допустимые значения коэффициентов в корректировках ставок по полу и возрасту и для посетивших сайт.
- [ ] 23 мая 2016 г.
Появилась возможность расходовать баллы агентства, а не рекламодателя при выполнении запроса от имени представителя агентства. Подробнее о баллах...
- [ ] 10 мая 2016 г.
В метод AdExtensions.get добавлены параметры запроса States и ModifiedSince и параметры ответа State и Associated.
- [ ] 18 апреля 2016 г.
Добавлен параметр DisplayUrlPath в методы сервиса Ads, а также параметр DisplayUrlPathModeration в ответ метода Ads.get для текстово-графических объявлений.
- [ ] 14 апреля 2016 г.
В метод Dictionaries.get добавлена возможность получать наименования внешних сетей (SSP).
- [ ] 30 марта 2016 г.
Параметр кампании ExcludedSites теперь поддерживает внешние сети (SSP).
- [ ] 29 марта 2016 г.
 Добавлен сервис AdExtensions для управления расширениями к объявлениям. В настоящее время доступен один тип расширения — уточнение. Подробнее об уточнениях...
В сервис Ads добавлена поддержка уточнений для текстово-графических объявлений и динамических текстовых объявлений. Подробнее об объявлениях...
 В сервис Ads добавлена поддержка изображений для объявлений с типом «Реклама мобильных приложений».
 Добавлен сервис Dictionaries для получения справочных данных: регионов, часовых поясов, курсов валют, станций метрополитена, ограничений на значения параметров и др.
- [ ] 14 марта 2016 г.
Параметр кампании BudgetPercent больше не поддерживает значение –1. Чтобы расход по дополнительным релевантным фразам был неограничен (в рамках бюджета кампании), используйте значение 100.
- [ ] 25 февраля 2016 г.
Добавлена настройка кампании ENABLE_AREA_OF_INTEREST_TARGETING в методы сервиса Campaigns (для всех типов кампаний).
- [ ] 16 февраля 2016 г.
Добавлен параметр кампании OptimizeGoalId в методы сервиса Campaigns (для кампаний с типом «Текстово-графические объявления»).
- [ ] 9 февраля 2016 г.
Изменены ограничения для ключевых фраз. Теперь группа объявлений может содержать не более 200 фраз, длина каждой фразы — не более 4096 символов.
- [ ] 13 января 2016 г.
В метод AdGroups.get добавлен параметр DomainUrlProcessingStatus.
- [ ] 11 января 2016 г.
В сервисе BidModifiers изменены допустимые значения коэффициентов в корректировках ставок по полу и возрасту и для посетивших сайт.
- [ ] 15 декабря 2015 г.
Добавлен сервис DynamicTextAdTargets для управления условиями нацеливания для динамических текстовых объявлений. Подробнее об условиях нацеливания...
В сервис Campaigns добавлена поддержка кампаний для динамических текстовых объявлений. Подробнее о кампаниях...
В сервис AdGroups добавлена поддержка групп для динамических текстовых объявлений. Подробнее о группах...
В сервис Ads добавлена поддержка динамических текстовых объявлений. Подробнее об объявлениях...
В метод Bids.get добавлена возможность постраничной выборки данных.
- [ ] 9 ноября 2015 г.
В метод Keywords.get добавлена возможность получать количество показов и кликов по ключевой фразе за 28 дней.
В метод Keywords.add добавлена возможность назначать ставку или приоритет для создаваемой ключевой фразы.
- [ ] 26 октября 2015 г.
 Добавлен сервис Campaigns для управления кампаниями. Сервис поддерживает кампании для рекламы мобильных приложений. Подробнее о кампаниях...
В сервис AdGroups добавлена поддержка групп для рекламы мобильных приложений. Подробнее о группах...
В сервис Ads добавлена поддержка объявлений для рекламы мобильных приложений. Подробнее об объявлениях...
 В методы Sitelinks.add и Sitelinks.get добавлен параметр Description.
- [ ] 30 сентября 2015 г.
В метод Bids.setAuto добавлена возможность рассчитывать ставки на поиске на основе минимальной ставки за второе место в спецразмещении.
- [ ] 8 сентября 2015 г.
Добавлен сервис BidModifiers для управления корректировками ставок. Подробнее о корректировках...
- [ ] 1 сентября 2015 г.
В метод Bids.get добавлена возможность получать результаты торгов нового аукциона: минимальную ставку за каждую позицию и списываемую цену на каждой позиции. Если во входном параметре FieldsNames указано значение AuctionBids, метод будет возвращать массив AuctionBids.
 - [x] 26 июня 2015 г.
Старт!
