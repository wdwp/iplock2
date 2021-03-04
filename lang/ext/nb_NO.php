<?php
$lang['friendlyname'] = 'Blokkerer IP&#039;er';
$lang['postinstall'] = 'Installasjon av IPLock er vellykket';
$lang['manage'] = 'Administrasjon av IPLock';
$lang['preuninstall'] = 'Listen med autoriserte IPer vil bli slettet. Er du sikker p&aring; at du vil avinstallere IPLock?';
$lang['postuninstall'] = 'Avinstallasjon av IPLock vellykket';
$lang['moddescription'] = 'Denne modulen gj&oslash;r det mulig &aring; behandle listen med IPer som er autorisert til &aring; koble seg til admin-grensesnittet p&aring; nettstedet.';
$lang['installed'] = 'Module versjon %s er installert';
$lang['uninstalled'] = 'Module versjon %s avinstallert';
$lang['note'] = 'Merknad';
$lang['general_pane_title'] = 'Generelle parametere';
$lang['default_process'] = 'Justering av standard operasjonsmoduls for IPLock';
$lang['process_example_all'] = 'Authorize all: only IP&#039;s set are banished.';
$lang['process_example_only'] = 'Prohibit all: only IP&#039;s set are authorized.';
$lang['allow_all'] = 'Tillat alle';
$lang['deny_all'] = 'Fjern bekreftelse for alle';
$lang['connection_limit'] = 'Grense for tilkoblinger';
$lang['connection_limit_description'] = 'Maksimalt antall tilkoblingsfors&oslash;k per minutt (minimum 0).<br />Om grensen n&aring;s, vil den IPen bli bannet.';
$lang['notification_explanation'] = 'Vis et varsel, n&aring;r noen blir utestengt?';
$lang['prefs_email_explanation'] = 'Send en e-post til admins, n&aring;r noen blir utestengt?';
$lang['prefs_email_input_explanation'] = 'Angi e-postadresser du vil sende meldingen til. Du kan angi flere ved &aring; skille dem med et komma.';
$lang['authorized_ip_explanation'] = 'Denn elisten benyttes n&aring;r IPLock er satt til &quot;Prohibit all&quot; modus';
$lang['authorized_ip_legend'] = 'Liste med IPer som er utrykkelig autoriserte';
$lang['add_ip_legend'] = 'Legg til en IP (eller IP omr&aring;de) til unntakslisten';
$lang['add_current_ip'] = 'Eller legg til din n&aring;v&aelig;rende IP (%s)';
$lang['ip_comment'] = 'Kommentarer';
$lang['syntax_legend'] = 'Syntaks';
$lang['syntax_intro'] = 'En IP-adresse er satt sammen av fire numre, fra 0 til 255. For hver av disse numrene, kan du sette :';
$lang['syntax_line1'] = 'En fast verdi, fra 0 til 255';
$lang['syntax_line2'] = 'Et omr&aring;de, som f.eks. 12-245';
$lang['syntax_line3'] = 'Alt, ved &aring; benytte &#039;*&#039;';
$lang['prohibited_ip_explanation'] = 'Denne listen benyttes uansett hvilken modus IPLock er satt til.';
$lang['prohibited_ip_legend'] = 'Liste med IPer  utrykkelig nektet';
$lang['banned_template'] = 'Forbannet mal';
$lang['banned_template_legend'] = 'Endre forbannet malen til slik du &oslash;nsker';
$lang['edit_ip_comment_legend'] = 'REdiger kommentarer for IP %s';
$lang['help'] = '<h3>IPLock</h3>
<p>IPLock filtrerer hvilke IP-adresser som kan koble seg til administrasjonspanelet.</p>
<h3>Hvordan benytter jeg denne?</h3>
<p>Etter installering, vil du finne IPLock under &quot;Nettstedsadmin.&quot;-menyen. 
Ellers s&aring; h&aring;per jeg at alt er selvforklarende.</p>
<h3>Tillatelser</h3>
<p>IPLock legger til rettigheten, &quot;IPLock Management&quot;, og denne b&oslash;r hakes av for de de som skal administrere IP locking.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2010, Beno&icirc;t Vermont <a href="mailto:redwarp@gmail.com">&amp;lt;redwarp@gmail.com&amp;gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['accessdenied'] = '<h3>Tilgang nektet</h3>
<p>Er du sikker p&aring; at du har de korrekte rettigheter? Om du har dette, s&aring; kontakter du din nettstedsadministrator s&aring; de kan korrigere dette problemet.</p>';
$lang['genericerror'] = 'Oioioi. Det ser ut som din siste handling for&aring;rsaket en feil. Sikker p&aring; at du har gjort alt korrekt?';
$lang['iperror'] = 'IPen spesifisert er ikke gyldig.';
$lang['delete'] = 'Fjern';
$lang['edit'] = 'Rediger kommentar';
$lang['cancel'] = 'Avbryt';
$lang['deleteconfirm'] = 'Bekreft sletting';
$lang['emptylist'] = 'Listen er tom';
$lang['wrongip'] = '%s : IP er ikke autorisert';
$lang['add'] = 'Legg til';
$lang['added_allowed_ip'] = '%s : IP autorisert';
$lang['added_denied_ip'] = '%s : IP bannet';
$lang['removed_ip'] = '%s : IP fjernet';
$lang['prefs'] = 'Preferanser';
$lang['allowed_ip'] = 'Autoriserte IPer';
$lang['denied_ip'] = 'Bannede IPer';
$lang['yes'] = 'Ja';
$lang['no'] = 'Nei';
$lang['save'] = 'Lagre endringene';
$lang['notification_message'] = 'Noen feilet i innlogging og ble forbannet. Se etter i %s&#039;s administrasjonspanel for &aring; fjerne denne meldingen.';
$lang['userbanned_event_desc'] = 'Send n&aring;r en bruker blir utestengt';
$lang['userbanned_event_help_paramh'] = 'Parametere';
$lang['userbanned_event_help_param1'] = '&#039;ip&#039; - refererer til IP-adressen til utestengt bruker';
$lang['userbanned_event_help_param2'] = '&#039;cause&#039; - viser til grunnen til at brukeren ble nektet. Verdien kan v&aelig;re &quot;admin&quot; eller &quot;auto&quot;';
$lang['alert_email_title'] = 'IPLock Varsling';
$lang['alert_email_info'] = 'Nettside';
$lang['alert_email_body'] = 'Noen, som benytter IP-adressen %s, fikk utestengt. Du &oslash;nsker sikkert &aring; sjekke dette n&aelig;rmere. Vennligst logg p&aring; administrasjonspanelet for &aring; ordne opp.';
$lang['warning_email_title'] = 'IPLock Advarsel';
$lang['warning_email_body'] = 'Noen, som benytter IP-adressen %s, klarte ikke &aring; logge p&aring; litt for ofte i de siste 24 timene, selv om han er i listen Godkjente. Du &oslash;nsker sikkert &aring; sjekke dette, bare i tilfelle. Vennligst logg p&aring; administrasjonspanelet for &aring; ordne opp.';
$lang['qca'] = 'P0-536849115-1307983495210';
$lang['utma'] = '156861353.1038670184.1341172511.1341335590.1341339252.6';
$lang['utmz'] = '156861353.1341172511.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.3.10.1341339252';
?>