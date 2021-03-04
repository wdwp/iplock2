<?php
$lang['friendlyname'] = 'Blocage d\'IP';
$lang['postinstall'] = 'L\'installation d\'IPLock est un succès';
$lang['manage'] = 'Gestion d\'IPLock';
$lang['preuninstall'] = 'La liste des IP autorisée sera détruite. Êtes-vous sur de vouloir désinstaller IPLock ?';
$lang['postuninstall'] = 'La désinstallation d\'IPLock est un succès';
$lang['moddescription'] = 'Ce module permet de gérer la liste des IP autorisées à se connecter sur l\'interface administrateur du site.';
$lang['installed'] = 'Module version %s installé';
$lang['uninstalled'] = 'Module version %s désinstallé';
$lang['note'] = 'Note ';
$lang['general_pane_title'] = 'Paramètres généraux';
$lang['default_process'] = 'Réglage du mode de fonctionnement par défault de IPLock';
$lang['process_example_all'] = 'En mode "Autoriser à tous", toutes les IPs sont autorisées par défault à se connecter à l\'interface admin.';
$lang['process_example_only'] = 'En mode "Interdire à tous", la seule IP autorisée par défault à se connecter à l\'interface admin est 127.0.0.1.';
$lang['allow_all'] = 'Autoriser à tous';
$lang['deny_all'] = 'Interdire à tous';
$lang['connection_limit'] = 'Limite de connexion';
$lang['connection_limit_description'] = 'Nombre de tentative de connexion par minute (minimum 0). <br />Si la limite est dépassée, l\'IP de l\'utilisateur sera bannie.';
$lang['notification_explanation'] = 'Afficher une notification, lorsque quelqu\'un se fait bannir ?';
$lang['prefs_email_explanation'] = 'Envoyer un email aux admins, quand quelqu\'un se fait bannir ?';
$lang['prefs_email_input_explanation'] = 'Veuillez spécifier les emails à qui vous souhaitez envoyer l\'alerte. Vous pouvez en désigner plusieurs en les séparant par une virgule.';
$lang['authorized_ip_explanation'] = 'Cette liste est utilisée au cas où IPLock fonctionne en mode "Interdire à tous".';
$lang['authorized_ip_legend'] = 'Liste des IPs autorisées expressément';
$lang['add_ip_legend'] = 'Ajouter une nouvelle IP (ou plage) aux exceptions';
$lang['add_current_ip'] = 'Ou ajoutez votre adresse IP actuelle (%s)';
$lang['ip_comment'] = 'Commentaires';
$lang['syntax_legend'] = 'Syntaxe';
$lang['syntax_intro'] = 'Une IP se décompose en quatre nombre variant de 0 à 255. Pour chacun de ces nombres, on peut spécifier :';
$lang['syntax_line1'] = 'Une valeur fixe, entre 0 et 255';
$lang['syntax_line2'] = 'Un plage, en tapant \'12-245\' par exemple';
$lang['syntax_line3'] = 'Tout nombre accepté, en tapant \'*\'';
$lang['prohibited_ip_explanation'] = 'Cette liste est utilisée quelque soit le mode. Une IP interdite sera toujours interdite.';
$lang['prohibited_ip_legend'] = 'Liste des IPs interdites expressément';
$lang['banned_template'] = 'Template de la page  "Banni"';
$lang['banned_template_legend'] = 'Modifiez le template comme vous le désirez.';
$lang['edit_ip_comment_legend'] = 'Rédigez un commentaire pour l\'IP %s';
$lang['help'] = '<h3>Que fait ce module ?</h3>
<p>IPLock filtre les adresses IP ayant le droit de se connecter sur l\'interface Admin</p>
<h3>Comment l\'utiliser ?</h3>
<p>Après installation, vous pouvez accéder au module IPLock par le panneau d\'administration sous le menu "Administration du site".
Son fonctionnement est pour le reste relativement évident, je l\'espère</p>
<h3>Permissions</h3>
<p>IPLock ajoute une permission, "Gestion d\'IPLock", et il est nécessaire qu\'elle soit cochée pour pouvoir administrer le blocage d\'IP</p>
<h3>Copyright et Licence</h3>
<p>Copyright @ 2010, Benoît Vermont - <a href="mailto:redwarp@gmail.com">redwarp@gmail.com</a>. Tous droits réservés.</p>
<p>Ce module est distribué sous la licence <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. Vous devez agréer aux termes de cette licence pour pouvoir utiliser ce module.</p>';
$lang['accessdenied'] = '<h3>Accès refusé</h3>
<p>Êtes vous sûr de posséder les droits suffisant ? Si oui, contactez votre administrateur afin
qu\'il corrige le problème</p>';
$lang['genericerror'] = 'Hohoho. Il semblerai que votre dernière opération ai généré une erreur. Êtes vous sûrs d\'avoir tout fait correctement ?';
$lang['iperror'] = 'L\'IP spécifiée n\'est pas valide.';
$lang['delete'] = 'Supprimer';
$lang['edit'] = 'Editer le commentaire';
$lang['cancel'] = 'Annuler';
$lang['deleteconfirm'] = 'Confirmez la suppression';
$lang['emptylist'] = 'La liste est vide';
$lang['wrongip'] = '%s : IP non autorisée';
$lang['add'] = 'Ajouter';
$lang['added_allowed_ip'] = '%s : IP autorisée';
$lang['added_denied_ip'] = '%s : IP bannie';
$lang['removed_ip'] = '%s : IP supprimée';
$lang['prefs'] = 'Préférences';
$lang['allowed_ip'] = 'IPs autorisées';
$lang['denied_ip'] = 'IPs bannies';
$lang['yes'] = 'Oui';
$lang['no'] = 'Non';
$lang['save'] = 'Enregistrer les modifications';
$lang['notification_message'] = 'Quelqu\'un s\'est fait bannir en se trompant d\'identifiants. Visitez le panneau d\'administration %s pour effacer cette notification.';
$lang['userbanned_event_desc'] = 'Envoyé dès que quelqu\'un se fait bannir.';
$lang['userbanned_event_help_paramh'] = 'Paramètres';
$lang['userbanned_event_help_param1'] = '\'ip\' - Référence à l\'adresse IP de l\'individu banni.';
$lang['userbanned_event_help_param2'] = '\'cause\' - Référence à l\'origine du bannissement. Sa valeur peut être \'admin\' ou \'auto\'';
$lang['alert_email_title'] = 'Alerte IPLock';
$lang['alert_email_info'] = 'Site Internet';
$lang['alert_email_body'] = 'Quelqu\'un, utilisant l\'adresse IP %s, s\'est fait bannir. Vous devriez probablement aller vérifier. Dirigez-vous vers votre panneau d\'administration pour régler ça.';
$lang['warning_email_title'] = 'Avertissement IPLock';
$lang['warning_email_body'] = 'Quelqu\'un, utilisant l\'adresse IP %s, s\'est trompé de login/mot de passe un peu trop souvent ces dernières 24h, alors qu\'il est dans la liste des IP authorisées. Vous devriez probablement aller vérifier, au cas où. Dirigez-vous vers votre panneau d\'administration pour régler ça.';
?>