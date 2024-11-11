@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Order History')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- quize attempts area -->
        <div
          class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5"
        >
          <!-- heading -->
          <div
            class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark"
          >
            <h2
              class="text-2xl font-bold text-blackColor dark:text-blackColor-dark"
            >
              Order History
            </h2>
          </div>

          <!-- main content -->
          <div class="overflow-auto">
            <table class="w-full text-left">
              <thead
                class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8"
              >
                <tr>
                  <th class="px-5px py-10px md:px-5">Order ID</th>
                  <th class="px-5px py-10px md:px-5">Course Name</th>
                  <th class="px-5px py-10px md:px-5">Date</th>
                  <th class="px-5px py-10px md:px-5">Price</th>
                  <th class="px-5px py-10px md:px-5">Status</th>
                </tr>
              </thead>
              <tbody
                class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal"
              >
                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #5478
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Success</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Processing</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #5478
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Success</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Processing</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>

                <tr class="leading-1.8 md:leading-1.8">
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #9656
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>App Development</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>January 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$100.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md"
                      >
                        On Hold</span
                      >
                    </p>
                  </td>
                </tr>
                <tr
                  class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark"
                >
                  <th
                    class="px-5px py-10px md:px-5 font-normal text-wrap"
                  >
                    <p class="text-blackColor dark:text-blackColor-dark">
                      #4585
                    </p>
                  </th>
                  <td class="px-5px py-10px md:px-5">
                    <p>Graphic</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>May 27, 2024</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p>$200.99</p>
                  </td>
                  <td class="px-5px py-10px md:px-5">
                    <p class="text-xs">
                      <span
                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md"
                      >
                        Canceled</span
                      >
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
