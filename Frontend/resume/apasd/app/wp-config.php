<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'ca07304_admin');

/** Имя пользователя MySQL */
define('DB_USER', 'ca07304_admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'nyooTjqOm3e3');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a9V <Eopuu;afZlZ:#XFp9;t]mvDyLMs!(H3a%1fg!;1>,Ws3A2jmU;1quCD*Ci.');
define('SECURE_AUTH_KEY',  'B7Uu{pGG@Ya0Ur[M$ra3$9q*=/^.nOFn:`Ji>bJ/@v%+{6@pMzQ`TNJnwxng2C:F');
define('LOGGED_IN_KEY',    'g(, BBXoR/J(utB0?>_pvAd-ot7hHeYEW^X[ f_gNR;=7tRq&4lLPi4PIdBMK$HW');
define('NONCE_KEY',        '$T&dHJo9mvzsf*9z]W9J8sSBcW;S7m]K.#)^u5*)j6mZYp[$|g;_;V6b~hE4*QSS');
define('AUTH_SALT',        '3}b%tcWEz1747h9E}P~8g?QTqUK#]Y|}6rsB:sJ_sCjkCpV]O`rJf(`Bn*ZnV!t0');
define('SECURE_AUTH_SALT', '<+OdMy5+lFm/AEfo![kSmxP8XBb4 !EDJGgUv*{E/@OlMS.L0.|<K)sHmH(Qv/p{');
define('LOGGED_IN_SALT',   'Qa*,z{pWO.RJYfNlnuN$e z7!o#9nt3(t_D;!R_?>71[T%KF@43pU`bWQ6c{a>dl');
define('NONCE_SALT',       'Gt:(}!Lgn+2&S*BO4k2{#Yq_~f~DPv?a 7_>fgj%f{#+wm=`%]h>OQw=b]X$VU1d');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
