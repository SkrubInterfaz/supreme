<?php
require_once('controleur/notifications.php');
if(isset($_Joueur_))
{
	?><script>
setInterval(ajax_alerts, 10000);
function ajax_alerts(){
	var url = '?action=get_alerts';
	$.post(url, function(data){
		alerts.innerHTML = data;
		ajax_new_alerts();
});
}
function ajax_new_alerts(){
	var url = '?action=new_alert';
	$.post(url, function(donnees){
		if(donnees > 0)
		{
			var message = "Vous avez ";
			message += donnees;
			message += " nouvelles alertes";
			toastr["success"](message, "Message Système")
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": true,
			  "positionClass": "toast-bottom-left",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "1000",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		}
	 });
}
</script>
<?php }
if(isset($modal))
{
	?>
	<script>  	$('#myModal').modal('toggle') 	</script>
	<?php
}
if($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1)
{
	?>
	<script>
	setInterval(ajax_signalement, 10000);
	function ajax_signalement(){
		var url = '?action=get_signalement';
		$.post(url, function(signalement){
			if(signalement > 0)
			{
				signalement.innerHTML = signalement;
				var message = "Il y'a ";
				message += signalement;
				message += ' nouveaux signalements !';
				toastr["error"](message, "Message système")
				toastr.options = {
				  "closeButton": true,
				  "debug": true,
				  "newestOnTop": false,
				  "progressBar": true,
				  "positionClass": "toast-top-left",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "1000",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				}
			}
		});
	}
	</script>
	<?php
}
?>
<script>$('document').ready(function() {

    var checked = [];

    $("input:checkbox[name=selection]").each(function() {
        $(this).click(function() {

            checked = $("input:checkbox[name=selection]:checked");

            if (checked.length > 0) {
                $('#popover').css('display', '')
            }
            else {
                $('#popover').css('display', 'none');
            }
        })
    });

    $('#sel-form').submit(function() {
        var $form = $(this);
        checked.each(function() {
            $('<input>').attr({
                type: 'hidden',
                name: 'id[]',
                value: $(this).val()
            }).appendTo($form);
        });
    });

});
</script>
<?php
if(isset($_GET['page']) && $_GET['page'] == "profil")
{
?><script>previewTopic($("#signature"));</script><?php
}
if(isset($_GET['setTemp']) && $_GET['setTemp'] == 1)
{
	?><script>
		toastr['success']("Votre nouveau mot de passe vous a été envoyé par mail !", "Message Système")
		toastr.options = {
		  "closeButton": true,
		  "debug": true,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-left",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "1000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	</script>
	<?php
}
if(isset($_GET['envoieMail']) && $_GET['envoieMail'] == true)
{
	?><script>
		toastr['info']("Un mail de récupération a bien été envoyé !", "Message Système")
		toastr.options = {
		  "closeButton": true,
		  "debug": true,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-left",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "5000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	</script><?php
}
if(isset($_GET['send']))
{
	?><script>
		$(document).ready(function() {
			Snarl.addNotification({
				title: "Messagerie",
				text: "Votre message a bien été envoyé !",
				icon: '<i class="far fa-paper-plane"></i>'
			});
		});
		</script>
<?php
}
if($_GET['page'] == "token" && $_GET['notif'] == 0 && isset($_GET['notif']))
{
	?><script>
		$(document).ready(function() {
			Snarl.addNotification({
				title: "Paypal",
				text: "Votre paiement a bien été effectué !",
				icon: '<i class="fab fa-paypal"></i>',
				timeout: null
			});
		});
		</script><?php
}
if($_GET['page'] == "token" && $_GET['notif'] == 1)
{
	?><script>
		$(document).ready(function() {
			Snarl.addNotification({
				title: "Paypal",
				text: "Vous avez annulé votre paiement !",
				icon: '<i class="fas fa-frown"></i>',
				timeout: null
			});
		});
		</script><?php
}
?>
