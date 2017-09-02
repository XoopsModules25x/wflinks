<?php
/**
 * $Id: main.php 10055 2012-08-11 12:46:10Z beckmi $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 * Format: UTF-8
 */

define('_MD_WFL_NOLINK', 'Эта ссылка не существует!');
define('_MD_WFL_SUBCATLISTING', 'Список категорий');
define('_MD_WFL_ISADMINNOTICE', 'Веб-мастер: Проблема с этим изображением.');
define('_MD_WFL_THANKSFORINFO', 'Спасибо за Ваш вклад.<br>Вы будете уведомлены, как только Ваш запрос будет одобрен веб-мастером.');
define('_MD_WFL_ISAPPROVED', 'Спасибо за Ваш вклад.<br>Ваш запрос одобрен и теперь будет отображаться в нашем списке.');
define('_MD_WFL_THANKSFORHELP', 'Спасибо, что помогли сохранить целостность этого каталога.');
define('_MD_WFL_FORSECURITY', 'По соображениям безопасности Ваше имя пользователя и IP-адрес также будут временно записаны.');
define('_MD_WFL_DESCRIPTION', 'Описание');
define('_MD_WFL_SUBMITCATHEAD', 'Форма отправки ссылки');
define('_MD_WFL_MAIN', 'Главная');
define('_MD_WFL_POPULAR', 'Популярные');
define('_MD_WFL_NEWTHISWEEK', 'Новый на этой неделе');
define('_MD_WFL_UPTHISWEEK', 'Обновлено на этой неделе');
define('_MD_WFL_POPULARITYLTOM', 'Популярность (от меньшего к большему)');
define('_MD_WFL_POPULARITYMTOL', 'Популярность (от большего к меньшему)');
define('_MD_WFL_TITLEATOZ', 'Название (A к Z)');
define('_MD_WFL_TITLEZTOA', 'Название (Z к A)');
define('_MD_WFL_DATEOLD', 'Дата (Первые ссылки)');
define('_MD_WFL_DATENEW', 'Дата (Новые ссылки)');
define('_MD_WFL_RATINGLTOH', 'Рейтинг (от низкого к высокому)');
define('_MD_WFL_RATINGHTOL', 'Рейтинг (от высокого к низкому)');
define('_MD_WFL_DESCRIPTIONC', 'Описание: ');
define('_MD_WFL_CATEGORYC', 'Категория: ');
define('_MD_WFL_VERSION', 'Версия');
define('_MD_WFL_SUBMITDATE', 'Отправлено');
define('_MD_WFL_LINKHITS', '<b>Переходов:</b> %s раз(а)');
define('_MD_WFL_URLRATING', '<b>ICRA</b>: %s');
define('_MD_WFL_PUBLISHERC', 'Опубликовал: ');
define('_MD_WFL_RATINGC', 'Рейтинг: ');
define('_MD_WFL_PAGERANK', 'Ранг страницы: ');
define('_MD_WFL_PAGERANKALT', 'Google PageRank: ');
define('_MD_WFL_ONEVOTE', '1 голос');
define('_MD_WFL_NUMVOTES', '%s голосов');
define('_MD_WFL_RATETHISFILE', 'Оценить ресурс');
define('_MD_WFL_MODIFY', 'Изменить');
define('_MD_WFL_REPORTBROKEN', 'Ссылка не работает');
define('_MD_WFL_BROKENREPORT', 'Сообщить о поврежденном ресурсе');
define('_MD_WFL_SUBMITBROKEN', 'Отправить');
define('_MD_WFL_BEFORESUBMIT', 'Прежде чем отправлять запрос о поврежденном ресурсе, пожалуйста, проверьте, что фактический источник ссылки, о которой Вы намереваетесь сообщить, не существует, и что веб-сайт не связан.');
define('_MD_WFL_TELLAFRIEND', 'Рекомендовать');
define('_MD_WFL_EDIT', 'Редактировать');
define('_MD_WFL_THEREARE', 'Есть <b>%s</b> <i>категорий</i> и <b>%s</b> <i>ссылок</i>');
define('_MD_WFL_THEREIS', 'Там есть <b>%s</b> <i>категорий</i> и <b>%s</b> <i>ссылок</i>');
define('_MD_WFL_LATESTLIST', 'Последние объявления');
define('_MD_WFL_FILETITLE', 'Название ссылки: ');
define('_MD_WFL_DLURL', 'URL ссылки: ');
define('_MD_WFL_LINK_DIRCA', ' Рейтинг интернет-контента: ');
define('_MD_WFL_HOMEPAGEC', 'Домашняя страница: ');
define('_MD_WFL_NOTSPECIFIED', 'Не определен');
define('_MD_WFL_SUBMITTER', 'Отправил');
define('_MD_WFL_UPDATEDON', 'Обновлено');
define('_MD_WFL_PRICEFREE', 'Свободно');
define('_MD_WFL_VIEWDETAILS', 'Посмотреть описание');
define('_MD_WFL_OPTIONS', 'Опции: ');
define('_MD_WFL_NOTIFYAPPROVE', 'Уведомить меня, когда эта ссылка будет одобрена');
define('_MD_WFL_VOTEAPPRE', 'Ваш голос ценен.');
define('_MD_WFL_THANKYOU', 'Спасибо, что нашли время, чтобы проголосовать здесь %s'); // %s is your site name
define('_MD_WFL_VOTEONCE', 'Пожалуйста, не голосуйте за один и тот же ресурс более одного раза.');
define('_MD_WFL_RATINGSCALE', 'Шкала составляет 1 - 10, при этом 1 плохо, а 10 - отлично.');
define('_MD_WFL_BEOBJECTIVE', 'Будьте объективны, если каждый получает 1 или 10 баллов, рейтинг не очень полезен.');
define('_MD_WFL_DONOTVOTE', 'Не голосуйте за свой собственный ресурс.');
define('_MD_WFL_RATEIT', 'Оцените это!');
define('_MD_WFL_INTFILEFOUND', 'Вот хорошая ссылка для ссылки на %s'); // %s is your site name
define('_MD_WFL_RANK', 'Ранг');
define('_MD_WFL_CATEGORY', 'Категория');
define('_MD_WFL_HITS', 'Хиты');
define('_MD_WFL_RATING', 'Рейтинг');
define('_MD_WFL_VOTE', 'Голос');
define('_MD_WFL_SORTBY', 'Сортировать по:');
define('_MD_WFL_TITLE', 'Название');
define('_MD_WFL_DATE', 'Дата');
define('_MD_WFL_POPULARITY', 'Популярность');
define('_MD_WFL_TOPRATED', 'Рейтинг');
define('_MD_WFL_CURSORTBY', 'Ссылки в настоящее время отсортированы по: %s');
define('_MD_WFL_CANCEL', 'Отмена');
define('_MD_WFL_ALREADYREPORTED', 'Вы уже отправили отчет для этого ресурса.');
define('_MD_WFL_MUSTREGFIRST', 'К сожалению, у вас нет разрешения на выполнение этого действия.<br>Пожалуйста, зарегистрируйтесь или авторизуйтесь!');
define('_MD_WFL_NORATING', 'Рейтинг не выбран.');
define('_MD_WFL_VOTEFORTITLE', 'Оценить эту ссылку: ');
define('_MD_WFL_CANTVOTEOWN', 'Вы не можете голосовать за предоставленный Вами ресурс.<br>Все голоса регистрируются и просматриваются.');
define('_MD_WFL_SUBMITLINK', 'Отправить ссылку');
define('_MD_WFL_SUB_SNEWMNAMEDESC', '<ul><li>Все новые ссылки подлежат проверке. Это может занять до 24 часов, прежде чем она появится в нашем списке.</li><li>Мы оставляем за собой право отказаться от любой переданной ссылки или изменить контент без согласования с Вами.</li></ul>');
define('_MD_WFL_MAINLISTING', 'Основные категории');
define('_MD_WFL_LASTWEEK', 'На прошлой неделе');
define('_MD_WFL_LAST30DAYS', 'Последние 30 дней');
define('_MD_WFL_1WEEK', '1 неделя');
define('_MD_WFL_2WEEKS', '2 недели');
define('_MD_WFL_30DAYS', '30 дней');
define('_MD_WFL_SHOW', 'Показать');
define('_MD_WFL_DAYS', 'дней');
define('_MD_WFL_NEWLINKS', 'Новые ссылки');
define('_MD_WFL_TOTALNEWLINKS', 'Всего новых ссылок');
define('_MD_WFL_DTOTALFORLAST', 'Всего новых ссылок за последние');
define('_MD_WFL_AGREE', 'Согласен');
define('_MD_WFL_DOYOUAGREE', 'Согласны ли вы с вышеуказанными условиями?');
define('_MD_WFL_DISCLAIMERAGREEMENT', 'Отказ от ответственности');
define('_MD_WFL_DUPLOADSCRSHOT', 'Загрузить снимок экрана:');
define('_MD_WFL_RESOURCEID', 'Ресурс id#: ');
define('_MD_WFL_REPORTER', 'Оригинальное сообщение: ');
define('_MD_WFL_DATEREPORTED', 'Дата сообщения: ');
define('_MD_WFL_RESOURCEREPORTED', 'Сообщено о ресурсах');
define('_MD_WFL_RESOURCEREPORTED2', 'Эта ссылка уже была объявлена ​​сломанной, мы работаем над исправлением');
define('_MD_WFL_BROWSETOTOPIC', '<b>Просмотр ссылок по алфавиту</b>');
define('_MD_WFL_WEBMASTERACKNOW', 'Подтвержден отчет о повреждении: ');
define('_MD_WFL_WEBMASTERCONFIRM', 'Подтвержден отчет о повреждении: ');
define('_MD_WFL_ERRORSENDEMAIL', 'Подтвержден отчет о повреждении, но произошла ошибка отправки уведомления по электронной почте веб-мастеру.');

define('_MD_WFL_DELETE', 'Удалить');
define('_MD_WFL_DISPLAYING', 'Отображается: ');
define('_MD_WFL_LEGENDTEXTNEW', 'Новые поступления');
define('_MD_WFL_LEGENDTEXTNEWTHREE', 'Новые за 3 дня');
define('_MD_WFL_LEGENDTEXTTHISWEEK', 'Новые за неделю');
define('_MD_WFL_LEGENDTEXTNEWLAST', 'Более 1 недели');
define('_MD_WFL_THISFILEDOESNOTEXIST', 'Ошибка: эта ссылка не существует!');
define('_MD_WFL_BROKENREPORTED', 'Неработающая ссылка');

define('_MD_WFL_REV_SNEWMNAMEDESC', '
Пожалуйста, полностью заполните форму ниже, и мы добавим Ваш отзыв как можно скорее.<br><br>
Спасибо, что нашли время, чтобы высказать свое мнение. Мы хотим дать нашим пользователям возможность быстрее находить качественное программное обеспечение.<br><br>Все отзывы будут рассмотрены одним из наших веб-мастеров, прежде чем они будут размещены на веб-сайте.
');
define('_MD_WFL_ISNOTAPPROVED', 'Сначала Ваше заявление должно быть одобрено модератором.');
define('_MD_WFL_HOMEPAGETITLEC', 'Название домашней страницы: ');
define('_MD_WFL_SCREENSHOT', 'Скриншот:');
define('_MD_WFL_SCREENSHOTCLICK', 'Показать все изображения');
define('_MD_WFL_OTHERBYUID', 'Другие ссылки: ');
define('_MD_WFL_LINKTIMES', 'Время ссылки: ');
define('_MD_WFL_MAINTOTAL', 'Всего ссылок: ');
define('_MD_WFL_LINKNOW', 'Посетить ссылку');
define('_MD_WFL_PAGES', '<b>Страницы</b>');
define('_MD_WFL_RATEDRESOURCE', 'Оценка ресурса');
define('_MD_WFL_PUBLISHER', 'Опубликовал');
define('_MD_WFL_ERROR', 'Ошибка обновления базы данных: информация не сохраняется');
define('_MD_WFL_COPYRIGHT', 'авторские права');
define('_MD_WFL_INFORUM', 'Обсудить в форуме');
// added frankblack
define('_MD_WFL_NOTALLOWESTOSUBMIT', 'Вы не можете отправлять ссылки');
define('_MD_WFL_INFONOSAVEDB', 'Информация не сохраняется в базе данных: <br><br>');

define('_MD_WFL_NEWLAST', 'Новый представленный на прошлой неделей');
define('_MD_WFL_NEWTHIS', 'Новый представленный на этой неделе');
define('_MD_WFL_THREE', 'Новые поступления за последние три дня');
define('_MD_WFL_TODAY', 'Новые отправленные сегодня');
define('_MD_WFL_NO_FILES', 'Нет ссылок');

define('_MD_WFL_NOPERMISSIONTOPOST', 'У Вас нет разрешения на размещение в этой категории.');

define('_MD_WFL_PUBLISHDATE', 'Опубликован');
define('_MD_WFL_APPROVE', 'Одобрить');
define('_MD_WFL_MODERATOR_OPTIONS', 'Установки модератора');

// added by McDonald
define('_MD_WFL_COUNTRY', 'Страна:');
define('_MD_WFL_COUNTRYB', '<b>Страна:</b>');
define('_MD_WFL_KEYWORDS', 'Ключевые слова:');
define('_MD_WFL_KEYWORDS_NOTE', 'Ключевые слова должны быть разделены запятой (keyword1, keyword2, keyword3, ..)');
define('_MD_WFL_NOLINKLOAD', 'Спасибо за ваш пост!');
define('_MD_WFL_LINKID', 'Ссылка id');
define('_MD_WFL_COUNTRYSORT', 'Страна');
define('_MD_WFL_COUNTRYLTOH', 'Страна (A к Z)');
define('_MD_WFL_COUNTRYHTOL', 'Страна (Z к A)');
define('_MD_WFL_BACKBUTTON', 'Назад');
define('_MD_WFL_ADMINSECTION', 'Административный отдел');
define('_MD_WFL_ADDTO', 'Добавить в: ');
define('_MD_WFL_INFORMATION', 'Информация');
define('_MD_WFL_ADDRESS', 'Контактная информация:');
define('_MD_WFL_LINK_GOOGLEMAP', 'Google Maps');
define('_MD_WFL_LINK_YAHOOMAP', 'Yahoo Maps');
define('_MD_WFL_LINK_MULTIMAP', 'Multimap');
define('_MD_WFL_LINK_CHECKMAP', 'Check map');
define('_MD_WFL_STREET1', 'Улица 1');
define('_MD_WFL_STREET2', 'Улица 2 (необязательно)');
define('_MD_WFL_TOWN', 'Город');
define('_MD_WFL_STATE', 'Штат');
define('_MD_WFL_ZIPCODE', 'ZIP код (индекс)');
define('_MD_WFL_TELEPHONE', 'Телефон');
define('_MD_WFL_TEL', 'Тел. ');
define('_MD_WFL_FAX', 'Факс ');
define('_MD_WFL_GETMAP', 'Get map');

// Version 1.05 RC5
define('_MD_WFL_VOIP', 'VoIP ');
define('_MD_WFL_PRINT', 'Распечатать');
define('_MD_WFL_NOITEMSELECTED', 'Вы не выбрали действительную ссылку!');
define('_MD_WFL_MOBILE', 'Мобильный');

// Version 1.05 RC6
define('_MD_WFL_VAT', 'НДС');
define('_MD_WFL_VATWIKI', 'Для получения дополнительной информации см. <a href="http://en.wikipedia.org/wiki/Value_added_tax_identification_number" target="_blank">Wikipedia</a>');
define('_MD_WFL_EMAIL', 'Email');
define('_MD_WFL_LINK_CREATEADDRESS', '<b>Подробное описание</b>');

//Version 1.06 RC2
define('_MD_WFL_STOPIT', 'STOP IT YOU FOOL!!');
