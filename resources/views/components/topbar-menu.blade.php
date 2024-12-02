<div class="main-menu">
  <ul class="main-menu-list">
    <!-- Dashboard -->
    <li class="menu-item-has-children {{ request()->is('dashboard*') ? 'active' : '' }}">
      <a href="{{ route('dashboard.index') }}" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Home') }}</div>
        </div>
      </a>
    </li>

    <!-- Data Master -->
    <li class="menu-item-has-children {{ 
            request()->routeIs('category.index') ||
            request()->routeIs('brand.index') ||
            request()->routeIs('unit.index') ||
            request()->routeIs('customer_group.index') ||
            request()->routeIs('tax.index') ||
            request()->routeIs('coupon.index') ||
            request()->routeIs('customer.index') ? 'active' : ''
        }}">
      <a href="#" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:circle-stack"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Data Master') }}</div>
        </div>
        <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
          <iconify-icon icon="heroicons-outline:chevron-down"></iconify-icon>
        </div>
      </a>
      <ul class="sub-menu">
        <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
          <a href="{{ route('category.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:tag" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Category</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('coupon.index') ? 'active' : '' }}">
          <a href="{{ route('coupon.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:ticket" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Coupon</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('brand.index') ? 'active' : '' }}">
          <a href="{{ route('brand.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:building-storefront" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Brand</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('tax.index') ? 'active' : '' }}">
          <a href="{{ route('tax.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:currency-dollar" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Tax</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('unit*') ? 'active' : '' }}">
          <a href="{{ route('unit.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:cube" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Unit</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('customer_group*') ? 'active' : '' }}">
          <a href="{{ route('customer_group.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:user-group" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Customer Group</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('customer*') ? 'active' : '' }}">
          <a href="{{ route('customer.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:users" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Customer</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('supplier*') ? 'active' : '' }}">
          <a href="{{ route('supplier.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:truck" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Supplier</span>
            </div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Purchase -->
    <li class="menu-item-has-children {{ 
            request()->routeIs('purchasepos.index') ||
            request()->routeIs('purchaseorder.index') ||
            request()->routeIs('invoicepurchase.index') ||
            request()->routeIs('returnpurchase.index') ? 'active' : ''
        }}">
      <a href="#" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:shopping-bag"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Purchase') }}</div>
        </div>
        <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
          <iconify-icon icon="heroicons-outline:chevron-down"></iconify-icon>
        </div>
      </a>
      <ul class="sub-menu">
        <li class="{{ request()->routeIs('purchasepos.index') ? 'active' : '' }}">
          <a href="{{ route('purchasepos.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:calculator" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Point Of Sale') }}</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('purchaseorder.index') ? 'active' : '' }}">
          <a href="{{ route('purchaseorder.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:document-text" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Purchase Order') }}</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('invoicepurchase.index') ? 'active' : '' }}">
          <a href="{{ route('invoicepurchase.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:document-check" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Invoice Purchase') }}</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('returnpurchase.index') ? 'active' : '' }}">
          <a href="{{ route('returnpurchase.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:arrow-uturn-left" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Return Purchase') }}</span>
            </div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Sales Order -->
    <li class="menu-item-has-children {{ 
            request()->routeIs('salesorder.index') || 
            request()->routeIs('pos.index') || 
            request()->routeIs('suratjalan.index') || 
            request()->routeIs('invoice.index') || 
            request()->routeIs('returnsalesorder.index') || 
            request()->routeIs('listorder.index') ? 'active' : '' 
        }}">
      <a href="#" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:shopping-cart"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Sales Order') }}</div>
        </div>
        <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
          <iconify-icon icon="heroicons-outline:chevron-down"></iconify-icon>
        </div>
      </a>
      <ul class="sub-menu">
        <li class="{{ request()->routeIs('pos.index') ? 'active' : '' }}">
          <a href="{{ route('pos.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:cash" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Point Of Sales</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('salesorder.index') ? 'active' : '' }}">
          <a href="{{ route('salesorder.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:document-plus" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Sales Order</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('suratjalan.index') ? 'active' : '' }}">
          <a href="{{ route('suratjalan.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:paper-airplane" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Surat Jalan</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('invoice.index') ? 'active' : '' }}">
          <a href="{{ route('invoice.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:document-text" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Invoice</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('returnsalesorder.index') ? 'active' : '' }}">
          <a href="{{ route('returnsalesorder.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:arrow-uturn-left" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">Return Product</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->routeIs('listorder.index') ? 'active' : '' }}">
          <a href="{{ route('listorder.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:list-bullet" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">List Order</span>
            </div>
          </a>
        </li>
      </ul>
    </li>

   

    <!-- Inventory -->
    <li class="menu-item-has-children {{ 
            request()->is('product*') ||
            request()->is('stockopname*') ||
            request()->is('logproduct*') ? 'active' : ''
        }}">
      <a href="{{ route('product.index') }}" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="iconoir:gift"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Inventory') }}</div>
        </div>
        <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
          <iconify-icon icon="heroicons-outline:chevron-down"></iconify-icon>
        </div>
      </a>
      <ul class="sub-menu">
        <li class="{{ request()->is('product*') ? 'active' : '' }}">
          <a href="{{ route('product.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:cube" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Product') }}</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('stockopname*') ? 'active' : '' }}">
          <a href="{{ route('stockopname.index') }}">
            <div class="flex space-x-2 items-start rtl:space-x-reverse">
              <iconify-icon icon="heroicons:document-text" class="leading-[1] text-base"></iconify-icon>
              <span class="leading-[1]">{{ __('Stock Opname') }}</span>
            </div>
          </a>
        </li>

      </ul>
    </li>


    <!-- database backup -->
    <li class="menu-item-has-children {{ request()->is('database-backups*') ? 'active' : '' }}">
      <a href="{{ route('database-backups.index') }}" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:database"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Database Backup') }}</div>
        </div>
      </a>
    </li>

    <!-- Setting -->
    <li class="menu-item-has-children {{ request()->is('general-settings.show*') ? 'active' : '' }}">
      <a href="{{ route('general-settings.show') }}" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="material-symbols:settings-outline"></iconify-icon>
          </span>
          <div class="text-box">{{ __('Settings') }}</div>
        </div>
      </a>
    </li>

    <!-- history-log -->
    <li class="menu-item-has-children {{ request()->is('history-log*') ? 'active' : '' }}">
      <a href="{{ route('history-log.index') }}" class="menu-item-link">
        <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
          <span class="icon-box">
            <iconify-icon icon="heroicons-outline:clock"></iconify-icon>
          </span>
          <div class="text-box">{{ __('History Log') }}</div>
        </div>
      </a>
    </li>

  </ul>
</div>