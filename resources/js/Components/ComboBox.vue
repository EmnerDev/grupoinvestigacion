<script setup>
import { computed, inject, ref, watch } from "vue";
import {
  Combobox,
  ComboboxButton,
  ComboboxInput,
  ComboboxOption,
  ComboboxOptions,
  TransitionRoot,
} from "@headlessui/vue";
import { ChevronDownIcon, XCircleIcon, XMarkIcon } from "@heroicons/vue/20/solid";

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
  modelValue: [Object, Array],
  integrantes: {
    type: Array,
    default: () => [],
  },
  loadIntegrantes: Function,
  createIntegrante: Function,
  nullable: Boolean,
  multiple: Boolean,
  placeholder: String,
  id: String,
  invalid: Boolean,
  ariaDescribedBy: String,
});

const field = inject("field", props);
const inputRef = ref();
const integrantes = ref(props.integrantes);
const isLoadingIntegrantes = ref(false);
const isCreatingIntegrante = ref(false);
const query = ref("");

console.log('props.integrantes',props.integrantes);
const queryIntegrante = computed(() => {
  if (!props.createIntegrante) {
    return null;
  }

  if (query.value === "") {
    return null;
  }

  if (filteredIntegrantes.value.length) {
    return null;
  }

  if (
    props.multiple &&
    props.modelValue?.some(
      integrante => integrante?.label.toLowerCase() === query.value?.toLowerCase()
    )
  ) {
    return null;
  }

  return {
    missing: true,
    label: query.value,
  };
});

if (props.loadIntegrantes) {
  watch(
    query,
    q => {
      isLoadingIntegrantes.value = true;

      props.loadIntegrantes(q, results => {
        integrantes.value = results;
        isLoadingIntegrantes.value = false;
      });

      inputRef.value?.$el?.setAttribute("size", q.length || 1);
    },
    { immediate: true }
  );
}

const filteredIntegrantes = computed(() => {
  let selectedIntegrantes = [];

  if (props.multiple) {
    selectedIntegrantes = props.modelValue;
  } else if (props.modelValue) {
    selectedIntegrantes = [props.modelValue];
  }

  const result = [
    ...selectedIntegrantes.filter(
      integrante => !integrantes.value.some(opt => opt?.value === integrante.value)
    ),
    ...integrantes.value,
  ];

  if (!query.value) {
    return result;
  }

  return result.filter(integrante => {
    return integrante?.label
      .toLowerCase()
      .replace(/\s+/g, "")
      .includes(query.value.toLowerCase().replace(/\s+/g, ""));
  });
});

function handleUpdateModelValue(selected) {
  emit("update:modelValue", selected);
  query.value = "";
  inputRef.value?.$el?.focus();

  if (!props.createIntegrante) return;

  if (props.multiple) {
    let newIntegrante = selected.length ? selected[selected.length - 1] : undefined;

    if (newIntegrante?.missing) {
      isCreatingIntegrante.value = true;
      props.createIntegrante(newIntegrante, integrante => {
        selected[selected.length - 1] = integrante;
        emit("update:modelValue", [...selected]);
        isCreatingIntegrante.value = false;
      });
    }
  } else {
    if (selected?.missing) {
      isCreatingIntegrante.value = true;
      props.createIntegrante(selected, integrante => {
        emit("update:modelValue", integrante);
        isCreatingIntegrante.value = false;
      });
    }
  }
}

function remove(integrante) {
  emit(
    "update:modelValue",
    props.modelValue?.filter(opt => opt.value !== integrante.value)
  );
}

function handleQueryDelete() {
  if (!query.value) {
    emit("update:modelValue", props.modelValue?.slice(0, -1));
  }
}

function clearSelection() {
  emit("update:modelValue", props.multiple ? [] : null);
  inputRef.value?.$el?.focus();
}
</script>

<template>
    <Combobox
      v-slot="{open}"
      :aria-describedby="field.ariaDescribedBy"
      :model-value="props.modelValue"
      :multiple="props.multiple"
      :nullable="props.nullable"
      as="div"
      by="value"
      class="relative"
      @update:model-value="handleUpdateModelValue"
    >
      <ComboboxButton
        :class="{
          'border-blue-500 bg-white': open && !field.invalid,
          'border-red-500': !open && field.invalid,
          'border-gray-300': !open && !field.invalid,
        }"
        class="min-h-[2.5rem] relative flex w-full flex-wrap items-center gap-1 overflow-hidden rounded border-2 bg-white p-1 pr-14 text-sm focus-within:border-blue-500 focus-within:!bg-white hover:bg-gray-100 focus:ring-0"
      >
        <template v-if="props.multiple">
          <div
            v-for="(option, idx) in props.modelValue"
            :key="idx"
            class="inline-flex items-center overflow-hidden rounded bg-gray-200 p-1.5 text-xs leading-none text-black"
          >
            <span>{{ option.label }}</span>
            <button
              class="-my-1.5 ml-1 -mr-1.5 self-stretch px-1 outline-0 hover:bg-red-200"
              @click.prevent="remove(option)"
            >
              <XMarkIcon class="h-3.5 w-3.5" />
            </button>
          </div>
        </template>
  
        <ComboboxInput
          :id="field.id"
          ref="inputRef"
          :displayValue="option => (props.multiple ? query : option?.label)"
          :placeholder="
            (props.multiple ? !props.modelValue.length : !props.modelValue)
              ? props.placeholder
              : ''
          "
          class="-mx-1 min-w-0 flex-grow cursor-pointer border-none bg-transparent py-0 px-2 text-sm placeholder-gray-400 focus:ring-0"
          size="1"
          @change="query = $event.target.value"
          @keydown.delete="props.multiple ? handleQueryDelete : undefined"
        />
  
        <div class="absolute inset-y-0 right-1 flex items-center">
          <button
            v-if="
              Array.isArray(props.modelValue)
                ? props.modelValue.length
                : props.modelValue
            "
            class="inline-flex h-full w-6 items-center justify-center text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none"
            @click.prevent="clearSelection"
          >
            <XCircleIcon
              aria-hidden="true"
              class="h-4 w-4"
            />
          </button>
  
          <ChevronDownIcon
            aria-hidden="true"
            class="h-5 w-5 text-gray-500"
          />
        </div>
      </ComboboxButton>
  
      <TransitionRoot
        class="absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded bg-white py-1 text-base shadow-md ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
        leave="transition ease-in duration-100"
        leaveFrom="opacity-100"
        leaveTo="opacity-0"
        @after-leave="query = ''"
      >
        <ComboboxOptions class="min-w-fit">
          <li
            v-if="!filteredIntegrantes.length && !isLoadingIntegrantes && !queryIntegrante"
            class="relative cursor-default select-none py-2 px-3 text-sm text-gray-700"
          >
            No coordinador...
          </li>
  
          <li
            v-if="isLoadingIntegrantes || isCreatingIntegrante"
            class="relative cursor-default select-none py-2 px-3 text-sm text-gray-700"
          >
            Loading...
          </li>
  
          <template v-if="!isLoadingIntegrantes && !isCreatingIntegrante">
            <ComboboxOption
              v-if="queryIntegrante"
              v-slot="{active}"
              :value="queryIntegrante"
              as="template"
            >
              <li
                :class="{
                  'bg-gray-200 shadow-[inset_2px_0px_0px] shadow-blue-600':
                    active,
                }"
                class="relative cursor-default select-none whitespace-pre py-2 px-3 text-sm active:bg-gray-300"
              >
                Create "{{ queryIntegrante.label }}"
              </li>
            </ComboboxOption>
  
            <ComboboxOption
              v-for="option in filteredIntegrantes"
              :key="option.id"
              v-slot="{selected, active}"
              :value="option"
              as="template"
            >
              <li
                :class="{
                  'shadow-[inset_2px_0px_0px] shadow-blue-600':
                    active || selected,
                  'bg-gray-100': selected,
                  'bg-gray-200': active,
                }"
                class="relative cursor-default select-none whitespace-pre py-2 px-3 text-sm active:bg-gray-300"
              >
                {{ option.persona.name }}
              </li>
            </ComboboxOption>
          </template>
        </ComboboxOptions>
      </TransitionRoot>
    </Combobox>
  </template>