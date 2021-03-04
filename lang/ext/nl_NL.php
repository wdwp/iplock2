<?php
$lang['friendlyname'] = 'Admin IP Lock';
$lang['postinstall'] = 'IPLock module is succesvol ge&iuml;nstalleerd';
$lang['manage'] = 'IPLock Beheer';
$lang['preuninstall'] = 'Weet u zeker dat u de IPLock module wilt verwijderen? Alle opgeslagen informatie zal ook worden gewist';
$lang['postuninstall'] = 'De IPLock module is gede&iuml;nstalleerd';
$lang['moddescription'] = 'Met deze module kunt u bepalen welke IP-adressen toegang mogen hebben tot het Beheer Paneel van de website';
$lang['installed'] = 'Module versie %s ge&iuml;nstalleerd';
$lang['uninstalled'] = 'Module versie %s gede&igrave;nstalleerd';
$lang['note'] = 'Toelichting';
$lang['general_pane_title'] = 'Algemene instellingen';
$lang['default_process'] = 'Instellingen voor de werking van de IPLock module';
$lang['process_example_all'] = 'Autoriseer alles: alleen ingestelde IP-adressen worden geblokkeerd.';
$lang['process_example_only'] = 'Blokkeer iedereen: sta alleen geautoriseerde IP-adressen toe.';
$lang['allow_all'] = 'Autoriseer alles';
$lang['deny_all'] = 'Blokkeer iedereen';
$lang['connection_limit'] = 'Verbindingspogingen Limiet';
$lang['connection_limit_description'] = 'Maximaal aantal aanmeld pogingen per minuut (minimum 0)<br />Als deze limiet wordt overschreden dan wordt het IP-adres geblokkeerd!';
$lang['notification_explanation'] = 'Toon een bericht als iemand geblokkeerd wordt als gevolg van tevergeefse inlogpogingen?';
$lang['prefs_email_explanation'] = 'Verstuur een e-mail naar de websitebeheerder(s), wanneer iemand geblokkeerd wordt?';
$lang['prefs_email_input_explanation'] = 'Specificeer de e-mail adressen van de personen aan wie u een waarschuwing wilt sturen. U kunt meerdere adressen scheiden door een komma.';
$lang['authorized_ip_explanation'] = 'Deze lijst wordt gebruikt wanneer IPLock is ingesteld op &quot;Autoriseer alles&quot;';
$lang['authorized_ip_legend'] = 'Lijst van IP-adressen die geautoriseerd zijn';
$lang['add_ip_legend'] = 'Voeg een IP-adres (of een IP reeks) toe aan de uitzonderingen lijst';
$lang['add_current_ip'] = 'Of voeg uw huidige IP-adres toe (%s)';
$lang['ip_comment'] = 'Opmerkingen';
$lang['syntax_legend'] = 'Opbouw IP-adres';
$lang['syntax_intro'] = 'Een IP-adres is opgebouwd uit vier getallen, van 0 tot 255. Deze vier getallen kunt u hier  invoeren:';
$lang['syntax_line1'] = 'Een vaste waarde, tussen 0 en 255';
$lang['syntax_line2'] = 'Een reeks, zoals 12-245';
$lang['syntax_line3'] = 'Alles, door alleen * in te toetsen';
$lang['prohibited_ip_explanation'] = 'Deze lijst wordt gebruikt in iedere bewerking van IPLock.';
$lang['prohibited_ip_legend'] = 'Lijst van handmatig geblokkeerde IP-adressen';
$lang['banned_template'] = 'Sjabloon Geblokkeerd';
$lang['banned_template_legend'] = 'U kunt dit sjabloon aanpassen aan uw wensen';
$lang['edit_ip_comment_legend'] = 'Wijzig opmerking voor IP-adres %s';
$lang['help'] = '<h3>Wat doet deze module?</h3>
<p>IPLock filtert IP-adressen die toegang krijgen tot het beheerpaneel</p>
<h3>Hoe gebruik ik het?</h3>
<p>Na de installatie vindt u de IPLock module onder het &quot;Websitebeheer&quot; menu.
De module is verder eigenlijk eenvoudig te gebruiken... Het wijst zichzelf.</p>
<h3>Permissies</h3>
<p>IPLock voegt de permissie, &quot;IPLock Management&quot; toe, en het zal moeten worden aangevinkt als u deze beveiliging wilt beheren.</p>
<h3>Copyright en Licentie</h3>
<p>Copyright &copy; 2010, Beno&icirc;t Vermont <a href="mailto:redwarp@gmail.com"><redwarp@gmail.com></a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['accessdenied'] = '<h3>Toegang geweigerd</h3>
<p>Heeft u de juiste rechten om aan te melden op deze website? Neem contact op met uw website beheerder, zodat hij het probleem kan oplossen.</p>';
$lang['genericerror'] = 'Oeps. Het lijkt er op dat deze bewerking een fout veroorzaakt... Weet u zeker dat u alles goed heeft ingevuld?';
$lang['iperror'] = 'Gespecificeerd IP-adres is niet correct.';
$lang['delete'] = 'Verwijder';
$lang['edit'] = 'Wijzig opmerking';
$lang['cancel'] = 'Annuleer';
$lang['deleteconfirm'] = 'Weet u zeker dat u wilt verwijderen?';
$lang['emptylist'] = 'De lijst is leeg';
$lang['wrongip'] = '%s : Niet geautoriseerd IP-adres';
$lang['add'] = 'Toevoegen';
$lang['added_allowed_ip'] = '%s : IP-adres geautoriseerd';
$lang['added_denied_ip'] = '%s : IP-adres geblokkeerd';
$lang['removed_ip'] = '%s : IP-adres verwijderd';
$lang['prefs'] = 'Instellingen';
$lang['allowed_ip'] = 'Geautoriseerde IP-adressen';
$lang['denied_ip'] = 'Geblokkeerde IP-adressen';
$lang['yes'] = 'Ja';
$lang['no'] = 'Nee';
$lang['save'] = 'Wijzigingen opslaan';
$lang['notification_message'] = 'Iemand heeft tevergeefs geprobeerd zichzelf in het Beheerpaneel aan te melden, en is nu door de IPLock module geblokkeerd. Controleer %s om de blokkering indien nodig op te heffen.';
$lang['userbanned_event_desc'] = 'Een tag die wordt aangeroepen als een gebruiker automatisch wordt geblokkeerd';
$lang['userbanned_event_help_paramh'] = 'Parameters ';
$lang['userbanned_event_help_param1'] = '&#039;ip&#039; - doelt op het IP-adres van de geblokkeerde gebruiker';
$lang['userbanned_event_help_param2'] = '&#039;cause&#039; - doelt op de reden dan iemand geblokkeerd is. De waarde kan &#039;admin&#039; of &#039;auto&#039; zijn';
$lang['alert_email_title'] = 'Admin IP Lock Waarschuwing';
$lang['alert_email_info'] = 'Website ';
$lang['alert_email_body'] = 'Iemand met het IP adres %s wordt nu geblokkeerd. U kunt dit controleren in het Beheerpaneel van de website. [Websitebeheer >> Admin IP Lock]';
$lang['warning_email_title'] = 'Admin IP Lock Waarschuwing';
$lang['warning_email_body'] = 'Iemand die het IP-adres %s gebruikt, heeft in de laatste 24 uur te vaak geprobeerd zich aan te melden, ondanks dat hij/zij is toegevoegd aan de Geautoriseerd Lijst. Waarschijnlijk is het verstandig in het Beheerpaneel te kijken wat hier aan de hand is...';
$lang['utma'] = '156861353.1269027775.1259416186.1274459505.1274467588.817';
$lang['utmz'] = '156861353.1274365710.809.139.utmccn=(referral)|utmcsr=atmytestsite.com|utmcct=/admin/moduleinterface.php|utmcmd=referral';
$lang['qca'] = 'P0-431297011-1259416186230';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.11.10.1274467588';
?>