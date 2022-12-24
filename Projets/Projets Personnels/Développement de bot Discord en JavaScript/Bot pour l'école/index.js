const Discord = require("discord.js");
const { EmbedBuilder } = require('discord.js');
const Client = new Discord.Client({
    intents: [
        Discord.GatewayIntentBits.Guilds,
        Discord.GatewayIntentBits.GuildMessages,
        Discord.GatewayIntentBits.GuildMessageReactions,
        Discord.GatewayIntentBits.GuildMessageTyping,
        Discord.GatewayIntentBits.MessageContent,
        Discord.GatewayIntentBits.GuildMembers,
    ],
    partials: ['CHANNEL',]  
});

const config = require("./config.json");

Client.login(config.token);

Client.on("ready", () => {
    console.log("Bot connecter");
    Client.user.setActivity("Tape !help pour plus d'aide");
});

const prefix = "!";

Client.on("messageCreate", message => {
    if (message.author.bot) return;
    
    if(message.content === prefix + "help"){
        const exampleEmbed = new EmbedBuilder()
        	.setColor(0x0099FF)
	        .setTitle('Liste des commandes')
	        .setDescription('Les différentes commandes du bot\n')
            .setThumbnail("https://i.imgur.com/Hwt9bw2.png")
            .addFields(
                { name: '!help', value: 'Affiche la liste des commandes', inline: true },
                { name: '!edt', value: 'Affiche l emploi du temps de cette semaine', inline: true },
                { name: '!controle', value: 'Affiche les contrôles de la semaine', inline: true },
                { name: '!date', value: 'Affiche la date d aujourdhui', inline: true },
                { name: '!devoir', value: 'Affiche les devoirs de cette semaine', inline: true },
                    );
        message.channel.send({ embeds: [exampleEmbed] });
        }
      
     if(message.content === prefix + "controle"){
        message.channel.send("__Pour la semaine du 24/10__\n \n- Contrôle de Probabilité\n- Contrôle de Dev Efficace");
     }
     
     if(message.content === prefix + "edt"){
        const attachment = new Discord.AttachmentBuilder('../BOTDISCORD/edt.png', 'edt.png');
        message.channel.send({files: [attachment]});
    }
    
    if(message.content === prefix + "date"){
        var date = new Date();
        var options = {weekday: "long", year: "numeric", month: "long", day: "2-digit"};
        message.reply(date.toLocaleDateString("fr-FR", options));
            }

    if(message.content ===  prefix + "devoir"){
        message.channel.send("__Pour la semaine du 24/10__\n \n-PPP : remplir tableau sur moodle à rendre avant 20h 18/10\n Anglais : Faire résumer du dernier cours fin de page ")
    } 

    
   

        }
    );

