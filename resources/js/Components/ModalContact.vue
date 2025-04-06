<template>
    <form>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Message</label>
            <textarea class="w-full p-2 border rounded"></textarea>
        </div>
        <button
            type="submit"
            class="btn bg-accent hover:bg-light-secondary hover:text-black rounded px-4 py-2"
        >
            Send
        </button>
    </form>
</template>
