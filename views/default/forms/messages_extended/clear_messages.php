<?php

echo '<label>' . elgg_echo('messages_extended:clear_messages:pattern') . '</label>';

echo elgg_view('input/text', array(
    'name' => 'search_pattern'
));

echo '<p>' . elgg_echo('messages_extended:clear_messages:description') . '</p>';

echo elgg_view('input/submit');
