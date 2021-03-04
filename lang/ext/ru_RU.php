<?php 

$lang['friendlyname'] = 'Блокировка IP';
$lang['postinstall'] = "IPLock был успешно установлен.";
$lang['manage'] = "Управление";
$lang['preuninstall'] = 'Список разрешённых IP будет удалён. Вы уверены, что хотите удалить IPLock ?';
$lang['postuninstall'] = 'IPLock был успешно удалён.';
$lang['moddescription'] = 'С помощью данного модуля вы можете создавать список IP, которым разрешён доступ в административную панель сайта.';
$lang['installed'] = 'Версия %s установлена';
$lang['uninstalled'] = 'Версия %s удалена';

/*-General-*/
$lang['note'] = 'Замечание';

/*-Preferences tab-*/
$lang['general_pane_title'] = 'Основные настройки';
$lang['default_process'] = 'Настройки IPLock по умолчанию';
$lang['process_example_all'] = "Разрешить всем: запрещено только IP, указанным как запрещённые.";
$lang['process_example_only'] = "Запретить всем: разрешено только IP, указанным как разрешённые.";
$lang['allow_all'] = 'Разрешить всем';
$lang['deny_all'] = 'Запретить всем';

$lang['connection_limit'] = 'Число попыток авторизации';
$lang['connection_limit_description'] = 'Число не удачных попыток в минуту (минимум 0).<br />Если лимит превышен, IP будет запрещён.';

$lang['notification_explanation'] = 'Выводить уведомление, если IP будет запрещён?';

/*-Authorized tab-*/
$lang['authorized_ip_explanation'] = 'Данный список используется когда IPLock работает в режиме "Запретить всех"';
$lang['authorized_ip_legend'] = 'Список разрешённых IP';
$lang['add_ip_legend'] = 'Добавить IP (или диапазон IP) в список исключений';
$lang['add_current_ip'] = 'Или добавить ваш текущий IP (%s)';

$lang['ip_comment'] = 'Комментарии';

$lang['syntax_legend'] = 'Правила';
$lang['syntax_intro'] = 'IP адрес состоит из 4 цифр от 0 до 255. Для каждых этих номеров вы можете указать :';
$lang['syntax_line1'] = 'Фиксированное значение между 0 и 255';
$lang['syntax_line2'] = "Диапазон, такой как 12-245";
$lang['syntax_line3'] = 'Все значения \'*\'';

/*-Prohibited tab-*/
$lang['prohibited_ip_explanation'] = 'Данный список используется в работе IPLock в режима "Разрешить всем".';
$lang['prohibited_ip_legend'] = 'Список запрещённых IP';


/*-banned template tab-*/

$lang['banned_template'] = 'Шаблон запрещённых IP';
$lang['banned_template_legend'] = 'Измените шаблон как вам нужно.';

/*-edit_ip_comment-*/
$lang['edit_ip_comment_legend'] = 'Редактировать комментарии для IP %s';

$lang['help'] = <<<EOL
<h3>Для чего это?</h3>
<p>IPLock определяет IP адреса, которые допускаются в административную панель.</p>
<h3>Как использовать?</h3>
<p>После установки вы найдёте IPLock в разделе "Администрирование".
 Думаю этого достаточно для объяснения.</p>
<h3>Права доступа</h3>
<p>IPLock имеет права доступа, "IPLock Management", и их надо добавить в группу пользователей, которые допускаются для администрирования.</p>
<h3>Копирайт</h3>
<p>Copyright &copy; 2010, Benoît Vermont <a href="mailto:redwarp@gmail.com">&lt;redwarp@gmail.com&gt;</a>. All Rights Are Reserved.</p>
<p>Данный модуль лицензирован на условиях <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. Вам необходимо согласится с данными условиями, если вы собираетесь использовать этот модуль.</p>
EOL;
$lang['accessdenied'] = <<<AOL
<h3>Доступ запрещён</h3>
<p>Убедитесь, что у вас есть право на управление данным модулем? Или свяжитесь с администратором сайта для решения данной проблемы.</p>
AOL;
$lang['genericerror'] = <<<UAL
Похоже ваше последнее действие вызвало ошибку. Вы уверены, что всё делаете правильно?
UAL;
$lang['iperror'] = <<<AOL
Указанный IP не верный.
AOL;
$lang['delete'] = 'Удалить';
$lang['edit'] = 'Редактировать комментарий';
$lang['cancel'] = 'Прервать';
$lang['deleteconfirm'] = 'Подтвердите удаление';
$lang['emptylist'] = 'Список пуст';
$lang['wrongip'] = '%s : Не разрешённый IP';
$lang['add'] = 'Добавить';
$lang['added_allowed_ip'] = '%s : IP разрешён';
$lang['added_denied_ip'] = '%s : IP запрещён';
$lang['removed_ip'] = '%s : IP удалён';
$lang['prefs'] = 'Настройки';
$lang['allowed_ip'] = 'Разрешённые IP';
$lang['denied_ip'] = 'Запрещённые IP';
$lang['yes'] = 'Да';
$lang['no'] = 'Нет';

$lang['save'] = 'Сохранить изменения';

$lang['notification_message'] = 'Кто-то пытался войти в административную панель и был заблокирован. Проверьте %s\'s чтобы удалить данное предупреждение.'

?>