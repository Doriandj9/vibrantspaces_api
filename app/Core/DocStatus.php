<?php

namespace App\Core;

class DocStatus {
    
    public const COMPLETE      = 'CO';
    public const DRAFT         = 'DR';
    public const ACTIVE        = 'AC';
    public const DELETE        = 'DL';
    public const EDIT          = 'ED';
    public const VIEW_NOTIFY   = 'VN';
    public const PENDING_NOTIFY= 'PN';
    public const NOT_SHOW_NOTIFY      = 'NS';



    public const COLUMN_NAME   = 'doc_status';
    public const LENGTH_COL    = 2;


}