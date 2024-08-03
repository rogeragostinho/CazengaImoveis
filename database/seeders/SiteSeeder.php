<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Site::create([
            'nome' => 'CazengaImóveis',
            'sobre' => 'Bem-vindo ao nosso projeto de localização de imóveis no município do Cazenga. Nossa plataforma foi criada com o objetivo de simplificar e facilitar a busca por propriedades na região. Oferecemos uma ampla variedade de imóveis, desde apartamentos modernos a casas espaçosas, atendendo a diversas necessidades e preferências. Nosso compromisso é fornecer uma experiência de busca intuitiva e eficiente, ajudando cada indivíduo a encontrar o lar ideal',
            'missao' => 'Nossa missão é facilitar a busca e o encontro do lar ideal para cada pessoa no município do Cazenga. Estamos comprometidos em oferecer uma plataforma intuitiva e abrangente que conecta os indivíduos com as propriedades que atendem às suas necessidades e estilo de vida.',
            'visao' => 'Nossa visão é ser a principal referência em localização de imóveis no município do Cazenga, tornando-se a escolha preferida de quem busca um lar na região. Desejamos ser reconhecidos não apenas pela qualidade dos nossos serviços, mas também pela nossa contribuição para o desenvolvimento sustentável da comunidade local.',
            'valores' => 'Nossos valores fundamentais guiam cada aspecto do nosso trabalho: Transparência: Priorizamos a honestidade e a clareza em todas as nossas interações. Excelência: Buscamos a excelência em tudo o que fazemos, visando sempre a melhoria contínua.',
            'telefone1' => '84948649',
            'telefone2' => '8923498',
            'whatsapp' => '289932839',
            'facebook' => 'cazengaimoveis',
            'instagram' => 'cazenga@78',
        ]);
    }
}
