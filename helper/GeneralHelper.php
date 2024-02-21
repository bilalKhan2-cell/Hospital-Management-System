<?php

function ShowAlert($class, $content, $heading)
{
    return  '<div class="card card-borderd">
                <div class="card-head">
                    <header>' . $heading . '</header>
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-close">
                                <i class="md md-close"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                ' . $content . '
                </div>
            </div>';
}

function GridView($class, $headers = [], $data = [])
{
    $table_strng = "<table class='" . $class . "'>";

    $table_strng .= "<thead>";

    foreach ($headers as $key => $value) {
        $table_strng .= "<tr>";
        $table_strng .= "<th>";
        $table_strng .= $value;
        $table_strng .= "</th>";
        $table_strng .= "</tr>";
    }

    $table_strng .= "</thead>";

    $table_strng .= "<tbody>";

    foreach ($data as $key => $value) {
        $table_strng .= "<tr>";
        $table_strng .= "<th>";
        $table_strng .= $value;
        $table_strng .= "</th>";
        $table_strng .= "</tr>";
    }

    $table_strng .= "</tbody>";

    $table_strng .= '</table>';
}
