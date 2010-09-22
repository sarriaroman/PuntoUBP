<?php
	/**
	 * @translation Facyla http://id.facyla.net/
	 */
	$french = array(
	
		/**
		 * Menu items and titles
		 */
	
			'messages' => "Messages",
            'messages:back' => "retour aux messages",
			'messages:user' => "Votre boîte de réception",
			'messages:sentMessages' => "Messages envoyés",
			'messages:posttitle' => "Messages de %s : %s",
			'messages:inbox' => "Boîte de réception",
			'messages:send' => "Envoyer une message",
			'messages:sent' => "Messages envoyés",
			'messages:message' => "Message",
			'messages:title' => "Titre",
			'messages:to' => "Pour",
            'messages:from' => "De",
			'messages:fly' => "Envoyer",
			'messages:replying' => "Message en réponse à",
			'messages:inbox' => "Boîte de réception",
			'messages:sendmessage' => "Envoyer un message",
			'messages:compose' => "Ecrire un message",
			'messages:sentmessages' => "Messages envoyés",
			'messages:recent' => "Messages reçus",
            'messages:original' => "Message d'origine",
            'messages:yours' => "Votre message",
            'messages:answer' => "Répondre",
			'messages:toggle' => 'Inverser la sélection',
			'messages:markread' => 'Marquer comme lu',
			
			'messages:new' => 'Nouveau message',
	
			'notification:method:site' => 'Site',
	
			'messages:error' => "Un problème est survenu lors de l'enregistrement de votre message. Veuillez réessayer.",
	
			'item:object:messages' => 'Messages',
	
		/**
		 * Status messages
		 */
	
			'messages:posted' => "Votre message a bien été envoyé.",
			'messages:deleted' => "Votre message a bien été effacé.",
			'messages:markedread' => "Vos messages ont bien été marqués comme lus.",
	
		/**
		 * Email messages
		 */
	
			'messages:email:subject' => 'Vous avez reçu un nouveau message !',
			'messages:email:body' => "Vous avez un nouveau message de %s. Il est écrit :

			
%s


Pour voir vos messages, cliquez sur :

	%s

Pour envoyer un message, cliquez sur :

	%s

Vous ne pouvez pas répondre à cet email.",
	
		/**
		 * Error messages
		 */
	
			'messages:blank' => "Désolé ; vous devez écrire quelque chose dans votre message avant de pouvoir l'enregistrer.",
			'messages:notfound' => "Désolé ; le message spécifié n'a pu être trouvé.",
			'messages:notdeleted' => "Désolé ; ce message n'a pu être effacé.",
			'messages:nopermission' => "Vous n'avez pas l'autorisation de modifier ce message.",
			'messages:nomessages' => "Il n'y a aucun message à afficher.",
			'messages:user:nonexist' => "Le destinataire n'a pu être trouvé dans la base de données des utilisateurs.",
	
	);
					
	add_translation("fr",$french);
?>