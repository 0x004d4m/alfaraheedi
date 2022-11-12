@if($entry->status == 4)
<a target="_blank" href="https://www.google.com/maps/dir/?api=1&origin={{ $entry->source_lat }},{{ $entry->source_long }}&destination={{ $entry->destination_lat }},{{ $entry->destination_long }}&travelmode=driving" class="text-info"><i class="la la-map"></i>View Map</a>
@endif

