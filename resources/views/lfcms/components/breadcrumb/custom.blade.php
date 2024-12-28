<ul
class="flex items-center flex-wrap gap-1.5 *:flex-center *:gap-1.5 leading-none text-gray-900 dark:text-dark-text">
<li
    class="text-primary-500 after:font-remix after:flex-center after:font-extrabold after:text-gray-900 after:size-5 after:content-['/'] after:translate-y-[1.4px] last:after:hidden [&.current-page]:text-gray-500 dark:[&.current-page]:text-dark-text-two">
    <a href="" class="flex-center shrink-0 gap-2 text-inherit">
        <i class="ri-home-6-line text-[16px] text-inherit"></i>
        Home
    </a>
</li>
<li
    class="text-primary-500 after:font-remix after:flex-center after:font-extrabold after:text-gray-900 after:size-5 after:content-['/'] after:translate-y-[1.4px] last:after:hidden [&.current-page]:text-gray-500 dark:[&.current-page]:text-dark-text-two current-page">
    <a href="#" class="flex-center shrink-0 gap-2 text-inherit active">
        <i class="ri-heart-2-line text-[16px] text-inherit"></i>
        {{ $title ?? 'Page' }}
    </a>
</li>
</ul>