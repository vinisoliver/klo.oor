<?php
include_once dirname(__DIR__) . "/../../styles/colors.php";
include_once dirname(__DIR__) . "/../../styles/typograph.php";
# Needs to include styles: global.css and modal.css

function CloseCallModal() {
   $script = "
      <script>
         function closeCallModalClose() {
            const modal = document.querySelector('#close-call-modal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
         }

         function closeCallModalOpen(callId) {
            const modal = document.querySelector('#close-call-modal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            const btn = document.querySelector('#close-call-modal-btn');
            btn.dataset.callId = callId;
         }

         function confirmCloseCall() {
            const btn = document.querySelector('#close-call-modal-btn');
            const callId = btn.dataset.callId;

            const basePath = window.location.origin + '/klo.oor'

            fetch(basePath + '/api/close-call.php', {
               method: 'POST',
               headers: {
                     'Content-Type': 'application/x-www-form-urlencoded'
               },
               body: 'call_id=' + encodeURIComponent(callId)
            })
            .then(response => response.json())
            .then(data => {
               if (data.success) {
                     closeCallModalClose();
                     location.reload();
               } else {
                     alert('Erro: ' + data.message);
               }
            })
            .catch(err => console.error(err));
         }
      </script>
   ";

   return $script . "
      <div id='close-call-modal' class='overlay' style='
         display: none;
         align-items: center;
         justify-content: center;
      '>
         <div style='
            background: " . Colors::$background . ";
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            width: 100%;
            max-width: 512px;
            border: 2px solid " . Colors::$secondary_background . ";
            color: " . Colors::$foreground . ";
         '> 
            <h2 style='" . GetTypograph("name") . "'>
               Encerrar chamado
            </h2>
            
            <p style='" . GetTypograph("paragraph") . "'>
               Você tem certeza que deseja encerrar esse chamado? Essa ação é irreversível.
            </p>

            <div style='
               display: flex;
               gap: 8px;
               width: 100%;
            '>
               " . Button([
                  "text" => "Cancelar",
                  "type" => "secondary",
                  "on-click" => "closeCallModalClose()",
               ]) . "
               " . Button([
                  "text" => "Encerrar",
                  "type" => "destructive",
                  "properties" => "id='close-call-modal-btn'",
                  "on-click" => "confirmCloseCall()",
               ]) . "
            </div>
         </div>
      </div>
   ";
}