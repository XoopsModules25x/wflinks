<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * Wfdownloads module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         wfdownload
 * @since           3.23
 * @author          Xoops Development Team
 */

$moduleDirName      = basename(dirname(dirname(__DIR__)));
$moduleDirNameUpper = strtoupper($moduleDirName);

define('CO_' . $moduleDirNameUpper . '_GDLIBSTATUS', 'Поддержка библиотеки GD: ');
define('CO_' . $moduleDirNameUpper . '_GDLIBVERSION', 'Версия библиотеки GD: ');
define('CO_' . $moduleDirNameUpper . '_GDOFF', "<span style='font-weight: bold;'>Отключено</span> (Нет доступных эскизов)");
define('CO_' . $moduleDirNameUpper . '_GDON', "<span style='font-weight: bold;'>Включено</span> (Миниатюры доступны)");
define('CO_' . $moduleDirNameUpper . '_IMAGEINFO', 'Состояние сервера');
define('CO_' . $moduleDirNameUpper . '_MAXPOSTSIZE', 'Максимальный размер сообщения (директива post_max_size в php.ini): ');
define('CO_' . $moduleDirNameUpper . '_MAXUPLOADSIZE', 'Максимальный размер загружаемого файла (директива upload_max_filesize в php.ini): ');
define('CO_' . $moduleDirNameUpper . '_MEMORYLIMIT', 'Предел памяти (директива memory_limit в php.ini): ');
define('CO_' . $moduleDirNameUpper . '_METAVERSION', "<span style='font-weight: bold;'>Скачать мета-версию:</span> ");
define('CO_' . $moduleDirNameUpper . '_OFF', "<span style='font-weight: bold;'>OFF</span>");
define('CO_' . $moduleDirNameUpper . '_ON', "<span style='font-weight: bold;'>ON</span>");
define('CO_' . $moduleDirNameUpper . '_SERVERPATH', 'Путь сервера к корню XOOPS: ');
define('CO_' . $moduleDirNameUpper . '_SERVERUPLOADSTATUS', 'Статус загрузки сервера: ');
define('CO_' . $moduleDirNameUpper . '_SPHPINI', "<span style='font-weight: bold;'>Информация, полученная из файла PHP ini:</span>");
define('CO_' . $moduleDirNameUpper . '_UPLOADPATHDSC', 'Заметка. Путь загрузки *ДОЛЖЕН* содержать полный путь к каталогу загрузки.');
