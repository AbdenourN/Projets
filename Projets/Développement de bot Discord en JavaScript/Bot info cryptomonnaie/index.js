const Discord = require("discord.js");
const { EmbedBuilder, messageLink } = require('discord.js');
const Client = new Discord.Client({
    intents: [
        Discord.GatewayIntentBits.Guilds,
        Discord.GatewayIntentBits.GuildMessages,
        Discord.GatewayIntentBits.GuildMessageReactions,
        Discord.GatewayIntentBits.GuildMessageTyping,
        Discord.GatewayIntentBits.MessageContent,
        Discord.GatewayIntentBits.GuildMembers,
    ],
});

const config = require("./config.json");
const dotenv = require('dotenv');
const axios = require('axios');
dotenv.config();

Client.login(config.token);

Client.on("ready", () => {
    console.log("Bot connecter");
    Client.user.setActivity("Tape /help pour plus d'aide");
});

const prefix = "/";

Client.on("messageCreate", async (message) => {
    if(message.author.Client) return;

    if(message.content === prefix + "help"){
        const exampleEmbed = new EmbedBuilder()
        	.setColor(0x0099FF)
	        .setTitle('Liste des commandes')
	        .setDescription('Les différentes commandes du bot\n')
            .setThumbnail("https://i.imgur.com/Hwt9bw2.png")
            .addFields(
                { name: '/help', value: 'Affiche la liste des commandes', inline: true },
                { name: '/price <crypto> <monnaie>', value: 'Compare une crypto à une monnaie réel', inline: true },
                { name: '/ping', value: 'Vérifie que le bot est en marche', inline: true },
                    );
        message.channel.send({ embeds: [exampleEmbed] });
        }

    if(message.content.startsWith('/ping')) {
        return message.reply('Bot en marche !')
    }

    if (message.content.startsWith('/price')) {
        const [command, ...args] = message.content.split(' ');
    
        if (args.length !== 2) {
          return message.reply(
            'Tu dois indiquer la cryptomonnaie en premier puis la monnaie pour les comparer'
          );
        } else {
          const [coin, vsCurrency] = args;
          try {
            // Get crypto price from coingecko API
            const { data } = await axios.get(
              `https://api.coingecko.com/api/v3/simple/price?ids=${coin}&vs_currencies=${vsCurrency}`
            );
            // Check if data exists
            if (!data[coin][vsCurrency]) throw Error();
    
            return message.reply(
              `Le prix courant de 1 ${coin} = ${data[coin][vsCurrency]} ${vsCurrency}`
            );
          } catch (err) {
            return message.reply(
              'Erreur, vérifie ce que ta écris. Par exemple ; /price bitcoin usd'
            );
          }
        }
      }
 });
  
