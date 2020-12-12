<p align="center">
<img src="https://i.imgur.com/6HAgq0G.png" alt="Kollapp Logo" height="50"><br><br>
Jongeren en jeugdhuizen dichter bijeen
</p>

# Personal Passion Project - Kollapp

## De Klant - Jeugdhuizen

Een jeugdhuis is geen simpel café voor de jeugd. Het is veel meer dan dat: workshops, optredens, ideeën realiseren, fuiven, bar momenten, **elkaars talenten tonen & ontdekken.** We merken dat dit laatste zeer belangrijk is binnen jeugdhuizen maar dat de talenten van jongeren niet ten volle wordt gebruikt.

## Core Project Statement

> Onderzoeksvraag:
> “Hoe kunnen we voor onze bezoekers, leden en vrijwilligers de interactie en verbinding met zowel online als offline dynamisch en creatief houden?”

### Talenten

Organisaties in het open jeugdwerk (jeugdclubs, jeugdhuizen, jeugdwerkinitiatieven,…) zijn broeiplaatsen van talentontwikkeling bij jongeren. In een veilige informele context hebben ze ruimte om hun competenties te ontdekken en verder te ontplooien.

Grafisch ontwerp – DJ Skills – Evenement organiseren – Begroting maken – Bar openhouden – Decor bouwen – Filmpjes maken – verslag opmaken – vergadering voorzitten – boekhouden - …

### Materiaal

Organisaties in het open jeugdwerk hebben elk hun eigen materiaal. Dit in kaart brengen en toegankelijk maken voor gebruik kan de versnippering tegengaan. Ze kunnen het materiaal beschikbaar stellen voor elkaar of voor externen. Telkens onder bepaalde voorwaarden.

Platenspelers – zeefdruk – beamer – zaagmachine – micro’s – lichtslinger – decorelementen – reflexcamera – laptops – meubilair – PA-tafel – Parasol – vrachtwagen - gameconsole…

## Een digitaal platform: Kollapp

> Kollapp: Samenvoeging van Kolle (bovenlokaal Ecosysteem) en App (application). Ook verwijzend naar het Engelse ‘Collaboration’ vrij vertaald ‘Samenwerking’.

### Delen van Mensen

- Database van talenten: Jongeren kunnen een profiel aanmaken en hun talenten, skills, competenties kenbaar maken.
- Zoekertjes van engagementen: Organisaties, werkgroepen, verenigingen kunnen jongeren zoeken om in nood in te vullen.

### Delen van materiaal

- Organisaties kunnen vlot bij elkaar zoeken welk materiaal beschikbaar is. Bijvoorbeeld: Platenspelers à JC Ten Goudberge,… Meteen informatie over beschikbaarheid, huurprijs, voorwaarden,…

- Externen kunnen zoeken bij jeugdhuizen wat uitleenbaar is. Eventueel met andere voorwaarden. Bv: hogere huurprijs,…

## Deliverables

Een platform die jeugdhuizen zal ondersteunen

## Blog-link

[Personal Passion Blog](https://ewoutverhamme.wixsite.com/passionproject)

## Development

To run everything locally, you need to da a few simple steps: 

### Run the development backend
1. Everything is running on [Laravel Homestead](https://laravel.com/docs/8.x/homestead). Please configure Homestead and [Vagrant](https://www.vagrantup.com/) first). 
2. Add a PHPMYADMIN route in Laravel Homestead
3. Add a frontend route in Laravel Homestead
4. Clone this repo into your Laravel Homestead code.
5. Add database credentials in the .env.example file and remove the .example
6. Run <code>composer intstall</code> to install the PHP dependencies
7. Run <code>vagrant up</code> in your Homestead folder. (This will run the Homestead environment with Laravel mix)

### Run the development frontend
1. Install dependencies using <code>yarn install</code>
2. Run <code>yarn hot</code> (This will run the Vue frontend)
3. Go to your route you defined in Homestead
4. Happy coding!