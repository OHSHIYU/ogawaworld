<?php
/**
 * Font manifest for OGAWA V-Accento
 *
 * NOTE:
 * - We avoid preloading TTF/OTF. After you convert to WOFF2, put the above-the-fold
 *   faces into 'preload' and list WOFF2 first in each 'src'.
 */

return [
  'preload' => [
    // e.g. 'Poppins-SemiBold.woff2'
  ],

  'faces' => [
    // --- Akzidenz Grotesk 
    [ 'family' => 'AkzidenzGrotesk', 'weight' => 800, 'style' => 'normal',
      'src' => ['Akzidenz Grotesk-Extra Bold.otf'] ],

    // --- Avenir
    [ 'family' => 'Avenir', 'weight' => 400, 'style' => 'normal',
      'src' => ['Avenir-Medium.ttf'] ],
    [ 'family' => 'Avenir', 'weight' => 700, 'style' => 'normal',
      'src' => ['Avenir-Black.ttf'] ],

    // --- Helvetica LT Std
    [ 'family' => 'HelveticaLTStd', 'weight' => 400, 'style' => 'normal',
      'src' => ['HelveticaLTStd-Light.otf'] ],
    [ 'family' => 'HelveticaLTStd', 'weight' => 700, 'style' => 'normal',
      'src' => ['HelveticaLTStd-Bold.otf'] ],

    // --- Inter 
    [ 'family' => 'Inter', 'weight' => 600, 'style' => 'italic',
      'src' => ['Inter-SemiBoldItalic.otf'] ],

    // --- Montserrat 
    [ 'family' => 'Montserrat', 'weight' => 800, 'style' => 'italic',
      'src' => ['Montserrat-ExtraBoldItalic.ttf'] ],

    // --- Poppins
    [ 'family' => 'Poppins', 'weight' => 600, 'style' => 'normal',
      'src' => ['Poppins-SemiBold.ttf'] ],
    [ 'family' => 'Poppins', 'weight' => 700, 'style' => 'normal',
      'src' => ['Poppins-Bold.ttf'] ],

    // --- Raleway
    [ 'family' => 'Raleway', 'weight' => 400, 'style' => 'normal',
      'src' => ['RALEWAY-VARIABLEFONT_WGHT.TTF'] ],
    [ 'family' => 'Raleway', 'weight' => 700, 'style' => 'normal',
      'src' => ['RALEWAY-VARIABLEFONT_WGHT.TTF'] ],

    // --- Spoon
    [ 'family' => 'Spoon', 'weight' => 400, 'style' => 'italic',
      'src' => ['Spoon-SemiboldItalic.ttf'] ],
  ],
];
