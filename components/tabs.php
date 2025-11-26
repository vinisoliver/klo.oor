<?php
function Tabs($props) {
   $sections = $props["sections"];

   if (count($sections) < 1) { return throw "Tabs: Missing at least section."; }
   
   $buttons = "<div style='display: flex; gap: 8px;'>";

   foreach($sections as $index => $section) {
      $section_content = $section["content"];
      if (is_callable($section_content)) {
         ob_start();
         $section_content();
         $section_content = ob_get_clean();
      }

      $safe_content = htmlspecialchars(TabsSection($section_content), ENT_QUOTES);

      $buttons .= Button([
         "text" => $section["name"] ?? "Section",
         "type" => $index === 0 ? "primary" : "secondary",
         "class" => 'tabs-btn',
         "on-click" => "updateTabsSection(this)",
         "properties" => "data-content='" . $safe_content . "'"
      ]);
   }
   $buttons .= "</div>";

   $first_section = $sections[0]["content"];
   if (is_callable($first_section)) {
      ob_start();
      $first_section();
      $first_section = ob_get_clean();
   }

   return "
      <div style='
         width: 100%;
         display: flex;
         flex-direction: column;
         gap: 16px;
      '>
         " . updateTabsSection() . "
         " . $buttons . "
         " . TabsSection($first_section) . "
      </div>
   ";
}

function TabsSection($content) {
   return "
      <div class='tab-section' style='
         width: 100%;
      '>
         " . $content . "
      </div>
   ";
}

function updateTabsSection() {
   return "<script>
      function updateTabsSection(btn) {
            const buttons = document.querySelectorAll('.tabs-btn');
            buttons.forEach(el => {
               el.style.color = '" . Colors::$foreground . "';
               el.style.background = '" . Colors::$secondary_background . "';
            });
            
            btn.style.color = '" . Colors::$foreground . "';
            btn.style.background = '" . Colors::$primary . "';

            const section = document.querySelector('.tab-section');
            if (section) section.innerHTML = btn.dataset.content;
      }
   </script>";
}