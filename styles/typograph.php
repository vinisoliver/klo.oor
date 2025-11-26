<?php

class Typograph {
   // Fonts
   public static string $font_family = "Inter, sans-serif";

   // Sizes
   public static string $size_XS = "10px";
   public static string $size_SM = "12px";
   public static string $size_MD = "14px";
   public static string $size_LG = "16px";
   public static string $size_XL = "24px";

   // Weights
   public static int $weight_regular = 400;
   public static int $weight_semibold = 600;
}

function GetTypograph($type) {
   $type = $type ?? "paragraph";

   $font_family = Typograph::$font_family;
   $size = match($type) {
      "title" => Typograph::$size_XL,
      "subtitle" => Typograph::$size_LG,
      "name" => Typograph::$size_MD,
      "paragraph" => Typograph::$size_MD,
      "label" => Typograph::$size_SM,
      "minimal" => Typograph::$size_XS,
   };
   $weight = match($type) {
      "title" => Typograph::$weight_semibold,
      "subtitle" => Typograph::$weight_semibold,
      "name" => Typograph::$weight_semibold,
      "paragraph" => Typograph::$weight_regular,
      "label" => Typograph::$weight_regular,
      "minimal" => Typograph::$weight_semibold,
   };

   return "
      font-family: " . $font_family . "; 
      font-size: " . $size . "; 
      font-weight: " . $weight . ";
   ";
}