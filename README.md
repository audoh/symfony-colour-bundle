# ColourBundle
A bundle written for Symfony 2.8 containing Twig filters to add and subtract hexadecimal colours.

## Installation

Put the bundle in your src folder, and add the following line to your services.yml:
<pre>kookas.colour_calc:
        class: Kookas\ColourBundle\Twig\ColourCalc
        public: false
        tags:
            - { name: twig.extension }</pre>

Then include the bundle in your app/AppKernel.php file, as usual.

## Usage

<code>colour1|addColour(colour2)</code>
<code>colour1|subColour(colour2)</code>

## Limitations (to be removed later)

- Colours must be in six-digit format.
- Services.yml must be manually configured.
