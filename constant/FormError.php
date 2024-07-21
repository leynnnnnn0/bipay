<?php

namespace app\constant;

enum FormError
{
    case REQUIRED;
    case VALID_EMAIL;
    case VALID_PHONE_NUMBER;
    case VALID_DATE;
    case VALID_PHOTO;
    case UNIQUE;
    case NUMBER;
}