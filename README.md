---

# Тестовое задание

Веб-приложение для управления списком книг в библиотеке.


## Установка

Чтобы установить и настроить проект, выполните следующие шаги:

1. Установите зависимости с помощью Composer:
    ```bash
    composer install
    ```
2. Примените миграции базы данных:
    ```bash
    php artisan migrate
    ```
3. Заполните базу данных начальными данными:
    ```bash
    php artisan db:seed
    ```
4. Запустите сборку фронтенда:
    ```bash
    npm i && npm run build
    ```

## Авторизация

Для редактирования, создания и удаления данных необходимо авторизоваться с правами администратора.

### Данные для входа:

- **Логин:** `test@example.com`
- **Пароль:** `password`

---
