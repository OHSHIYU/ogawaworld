<?php
return [
  'preload' => [
    // e.g. '', ''
  ],

  'faces' => [
    // --- Myriadpro (Regular, Bold)
    [ 'family' => 'Myriad Pro', 'weight' => 400,
      'src' => ['MYRIADPRO-REGULAR.OTF'] ],
    [ 'family' => 'Myriad Pro', 'weight' => 700,
      'src' => ['MYRIADPRO-BOLD.OTF'] ],

    // --- Poppins (ExtraLightItalic, LightItalic)
    [ 'family' => 'Poppins', 'weight' => 100, 'style' => 'italic',
      'src' => ['Poppins-ExtraLightItalic.ttf'] ],
    [ 'family' => 'Poppins', 'weight' => 200, 'style' => 'italic', 
      'src' => ['Poppins-LightItalic.ttf'] ],
  ],
];
