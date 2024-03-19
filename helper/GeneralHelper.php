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

function ShowUnCardAlert($class, $content)
{
    return '<div class="alert alert-' . $class . '">
        <span>' . $content . '</span>
    </div>';
}
