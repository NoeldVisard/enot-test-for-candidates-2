Имеется система настроек пользователя

Задача: Реализовать систему подтверждения смены конкретной настройки пользователя по коду из смс / email / telegram с возможностью выбора пользователем другого метода

Какие вы выделили бы слои, абстракции, таблицы?

Реализуйте данную схему без интеграции конкретных сервисов / ORM / прочее на уровне интерфейсов / контроллеров

================================================

> Какие вы выделили бы слои, абстракции, таблицы?

1. Слой данных (таблица в бд с пользователями и сущностями подтверждения)
2. Слой доступа к данным (репозитории)
3. Слой сервисной логики 
4. Презентационный слой (отображение view и обработка запросов)

- Таблица Users: id (PK), email (varchar), password (varchar), settings (jsonb)

- Таблица Confirmations: id (PK), userId (FK), settingId (FK), code (varchar), delayDate (timestamp)

Абстракции Sender (для отправки кода), Repository (для изменения данных в бд), Controller (для отображения
данных на странице и обработки запросов) сильно упростят работу.