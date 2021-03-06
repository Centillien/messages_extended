<?php

global $CONFIG;

admin_gatekeeper();

ini_set('max_execution_time', 60*60);

$search_pattern = get_input('search_pattern');

/* @var ElggEntity[] $removalEntities */
$removalEntities = new ElggBatch('elgg_get_entities', array(
    'type' => 'object',
    'subtype' => 'messages',
    'limit' => 0,
    'joins' => array(
        'JOIN ' . $CONFIG->dbprefix . 'objects_entity oe ON oe.guid = e.guid'
    ),
    'wheres' => array(
        'oe.title LIKE "%' . sanitise_string($search_pattern) . '%"'
    ),
));

$count = 0;

foreach ($removalEntities as $removalEntity) {
    if ($removalEntity->delete()) {
        $count++;
    }
}

system_message(elgg_echo('messages_extended:clear_messages:messages', [$count]));
