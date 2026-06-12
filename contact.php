<?php
/**
 * Template Name: Contact
 *
 * @package guardexpert
 */

get_header();

$hero_title = get_field('contact_hero_title') ?: 'Свяжитесь с нами удобным способом';
$hero_description = get_field('contact_hero_description');
$hero_image = get_field('contact_hero_image');
$hero_bg = get_field('contact_hero_bg');
$hero_button_text = get_field('contact_hero_button_text') ?: 'Получить консультацию';
$contacts = get_field('contact_items');
$requisites_title = get_field('contact_requisites_title') ?: 'Реквизиты';
$requisites_items = get_field('contact_requisites_items');
$form_title = get_field('contact_form_title') ?: 'Оставьте заявку';
$form_description = get_field('contact_form_description');
$form_button = get_field('contact_form_button') ?: 'Отправить';
$map_title = get_field('contact_map_title') ?: 'Как нас найти';
$map_description = get_field('contact_map_description');
$map_address = get_field('contact_map_address') ?: 'Минск, улица Ольшевского, 22';
?>

<!-- Hero Section -->
<section class="hero-contacts-bg relative overflow-hidden -mt-[120px] lg:-mt-[220px]" <?php if ($hero_bg): ?>style="background-image: url('<?php echo esc_url($hero_bg); ?>');"<?php endif; ?>>
    <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
            <div class="lg:w-1/2">
                <nav class="text-sm text-gray-500 mb-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#B22234]">Главная</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-700">Контакты</span>
                </nav>
                <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                    <?php echo esc_html($hero_title); ?>
                </h1>
                <?php if ($hero_description): ?>
                <p class="text-gray-600 text-base lg:text-lg mb-8 max-w-lg">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <?php endif; ?>
                <a href="#" class="js-open-consultation inline-flex items-center gap-2 bg-[#B22234] text-white px-8 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                    <?php echo esc_html($hero_button_text); ?>
                </a>
            </div>
            <?php if ($hero_image): ?>
            <div class="lg:w-1/2 flex justify-center lg:justify-end">
                <img src="<?php echo esc_url($hero_image); ?>" alt="Контакты" class="rounded-lg shadow-lg max-w-full h-auto opacity-90">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Контактная информация -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-8">Контактная информация</h2>

        <div class="grid lg:grid-cols-2 gap-6">
            <!-- Left Column: Contacts + Requisites -->
            <div class="flex flex-col gap-6">
                <?php if ($contacts): ?>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <ul class="space-y-4">
                        <?php foreach ($contacts as $contact): ?>
                        <li class="flex items-center gap-3">
                            <div class="w-10 h-10 border-2 border-[#B22234] rounded flex items-center justify-center flex-shrink-0">
                                <?php if ($contact['icon']): ?>
                                <img src="<?php echo esc_url($contact['icon']); ?>" alt="<?php echo esc_attr($contact['type']); ?>" class="w-5 h-5 object-contain">
                                <?php endif; ?>
                            </div>
                            <?php if ($contact['type'] === 'phone'): ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact['value'])); ?>" class="text-gray-900 font-medium hover:text-[#B22234] transition">
                                <?php echo esc_html($contact['value']); ?>
                            </a>
                            <?php elseif ($contact['type'] === 'email'): ?>
                            <a href="mailto:<?php echo esc_attr($contact['value']); ?>" class="text-gray-900 font-medium hover:text-[#B22234] transition">
                                <?php echo esc_html($contact['value']); ?>
                            </a>
                            <?php else: ?>
                            <span class="text-gray-900 font-medium"><?php echo esc_html($contact['value']); ?></span>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ($requisites_items): ?>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4"><?php echo esc_html($requisites_title); ?></h3>
                    <div class="space-y-2">
                        <?php foreach ($requisites_items as $req): ?>
                        <p class="text-gray-900"><span class="font-bold"><?php echo esc_html($req['label']); ?></span> <?php echo esc_html($req['value']); ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Right Column: Form -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 shadow-sm">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2"><?php echo esc_html($form_title); ?></h3>
                <?php if ($form_description): ?>
                <p class="text-gray-600 text-sm mb-6"><?php echo esc_html($form_description); ?></p>
                <?php endif; ?>
                <form class="space-y-4">
                    <input type="text" placeholder="Ваше имя" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                    <input type="tel" name="contact_phone" id="contact-phone" placeholder="+375 (XX) XXX-XX-XX" required class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                    <textarea placeholder="Комментарий" rows="3" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] resize-none"></textarea>
                    <label class="flex items-start gap-3 text-sm text-gray-600">
                        <div class="w-6 h-6 bg-[#B22234] rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        <span>Продолжая, вы соглашаетесь с политикой конфиденциальности</span>
                    </label>
                    <button type="submit" class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition"><?php echo esc_html($form_button); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php if ($map_address): ?>
<!-- Как нас найти -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($map_title); ?></h2>
            <?php if ($map_description): ?>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($map_description); ?></p>
            <?php endif; ?>
        </div>

        <div class="rounded-lg overflow-hidden border border-gray-200 shadow-sm bg-white">
            <iframe 
                src="https://yandex.ru/map-widget/v1/?text=<?php echo urlencode($map_address); ?>&z=16" 
                width="100%" 
                height="500" 
                frameborder="0" 
                allowfullscreen="true"
                class="w-full">
            </iframe>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
    lucide.createIcons();
</script>
<?php
get_footer();