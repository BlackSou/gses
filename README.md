# GSES2 BTC app - Software Engineering School 3.0 Case

## Опис завдання
Потрібно реалізувати сервіс з АРІ, який дозволить:
* дізнатись поточний курс біткоіну (BTC) у гривні (UAH);
* підписати емейл на отримання інформації по зміні курсу;
* запит, який відправить всім підписаним користувачам актуальний курс.

## Додаткові вимоги
1. Сервіс має відповідати описаному ниже АРІ. NB Закривати рішення аутентифікацією не потрібно.
2. Всі данні, для роботи додатку повинні зберігатися в файлах (підключати базу данних не потрібно).
   Тобто, потрібно реалізувати збереження та роботу з даними (наприклад, електронними адресами)
   через файлову систему. 
3. В репозиторії повинен бути Dockerfile, який дозволяє запустити
   систему в Docker. З матеріалом по Docker вам необхідно
   ознайомитись самостійно. 
4. Також ти можеш додавати коментарі чи опис логіки виконання
   роботи в README.md документі. Правильна логіка може стати
   перевагою при оцінюванні, якщо ти не повністю виконаєш
   завдання.

Очікувані мови виконання завдання: PHP, Go. Виконувати завдання іншими мовами можна, проте, це не буде перевагою.
Виконане завдання необхідно завантажити на GitHub (публічний репозиторій) та сабмітнути виконане завдання в гугл-форму.
Можна користуватися усією доступною інформацією, але виконуй завдання самостійно.

```
.
├── app
│   ├── controllers
│   │   ├── BaseController.php
│   │   ├── EmailController.php
│   │   ├── MailController.php
│   │   └── RateController.php
│   └── services
│       ├── EmailService.php
│       ├── MailService.php
│       └── RateService.php
├── data
│   └── emails.json
├── docker
│   └── Dockerfile
├── logs
│   └── app.log
├── routes
│   └── api.php
├── .gitignore
├── composer.json
├── docker-compose.yml
├── index.php
└── README.md
```

## Description

This API is implemented in PHP without relying on any frameworks or external libraries. 
The code follows a separated logic approach, making it easily readable and maintainable. 
The API has been thoroughly tested and is ready for deployment with minimal effort required.

## Usage
1. Docker
2. PHP + Composer + PHPMailer

### Importing

```
git clone https://github.com/BlackSou/gses.git
```
```
cd gses2-shool-btc
```
### Docker

Configured SMTP in environment:
```
nano docker-compose.yml
```
Deployment Docker containers:
```
docker-compose up -d
```
Set up dependencies:
```
docker exec -ti app sh
```
```
composer install
```
Successful: 
```http://localhost:80/```

## API Endpoints:

/rate - GET: Retrieves the current BTC to UAH ratio.

    curl -X GET http://localhost:80/rate

/subscribe - POST: Allows users to subscribe for email notifications.

    curl -X POST http://localhost:80/subscribe -H "Content-Type: application/json" -d '{"email":"email@example.com"}'

/sendEmails - POST: Sends the current rate to all subscribed users.

    curl -X POST http://localhost:80/sendEmails
