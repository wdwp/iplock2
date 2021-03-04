{$tabs_start}
	{$prefs_tab_start}
		<fieldset><legend>{$general_pane_title}</legend>
		{$prefs_form_start}
			<div class='pageoverflow'>
				<p class='pagetext'>{$default_process}:</p>

				<p class='pageinput'>
				{$prefs_radio}
				</p>
                
				<p class='pageinput'>
                <strong>{$note}:</strong>  {$process_example_all} | {$process_example_only}
				</p>
			</div>
			<div class='pageoverflow'>
				<p class='pagetext'>{$connection_limit}:</p>
				<p class='pageinput'>
					{$connection_limit_description}
				</p>
				<p class='pageinput'>
				{$prefs_input}
				</p>
			</div>
			<div class='pageoverflow'>
				<p class='pagetext'>{$notification_explanation}</p>
				<p class='pageinput'>{$prefs_notification_radio}</p>
			</div>
			<div class='pageoverflow'>
				<p class='pagetext'>&nbsp;</p>
				<p class='pageinput'>
				{$prefs_submit}	
				</p>
			</div>
		{$form_end}
		</fieldset>
	{$tab_end}
	{$allowed_ip_tab_start}
		<p>{$authorized_ip_explanation}</p>
		<fieldset><legend>{$authorized_ip_legend}</legend>
			{$allowed_ip_table}
		</fieldset>
		<fieldset><legend>{$add_ip_legend}</legend>
			<p>
				{$allowed_ip_field}
			</p>
		</fieldset>
		<fieldset><legend>{$syntax_legend}</legend>
			<p>{$syntax_intro}</p>
			<ul>
				<li style='list-style-type: disc;'>{$syntax_line1}</li>
				<li style='list-style-type: disc;'>{$syntax_line2}</li>
				<li style='list-style-type: disc;'>{$syntax_line3}</li>
			</ul>
		</fieldset>
	{$tab_end}
	{$denied_ip_tab_start}
		<p>{$prohibited_ip_explanation}</p>
		<fieldset><legend>{$prohibited_ip_legend}</legend>
			{$denied_ip_table}
		</fieldset>
		<fieldset><legend>{$add_ip_legend}</legend>
			<p>
				{$denied_ip_field}
			</p>
		</fieldset>
		<fieldset><legend>{$syntax_legend}</legend>
			<p>{$syntax_intro}</p>
			<ul>
				<li style='list-style-type: disc;'>{$syntax_line1}</li>
				<li style='list-style-type: disc;'>{$syntax_line2}</li>
				<li style='list-style-type: disc;'>{$syntax_line3}</li>
			</ul>
		</fieldset>
	{$tab_end}
	{*{$banned_template_tab_start}
    	{$banned_template_form_start}
		<fieldset><legend>{$banned_template_legend}</legend>
			<p>
				{$banned_template_textarea}
			</p>
		</fieldset>
        {$prefs_submit}	
        {$form_end}
	{$tab_end}*}
{$tabs_end}