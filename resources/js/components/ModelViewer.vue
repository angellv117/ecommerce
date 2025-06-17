<template>
    <div class="model-viewer-container">
        <div ref="viewer" class="bg-red-500"></div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

const props = defineProps({
    modelName: String
});

const viewer = ref(null);

onMounted(() => {
    console.log(props.modelName);
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    viewer.value.appendChild(renderer.domElement);

    // Cargar el modelo .glb basado en la prop `modelName`
    const loader = new GLTFLoader();
    loader.load(`/models/${props.modelName}.glb`, (gltf) => {
        scene.add(gltf.scene);
        gltf.scene.scale.set(1, 1, 1);  // Escala del modelo, ajústalo según sea necesario
        gltf.scene.position.set(0, 0, 0);  // Posición del modelo en la escena
    }, undefined, (error) => {
        console.error('Error cargando el modelo:', error);
    });

    // Cámara
    camera.position.z = 5;

    // Agregar controles de órbita para mover la cámara
    const controls = new OrbitControls(camera, renderer.domElement);

    // Animación de renderizado
    function animate() {
        requestAnimationFrame(animate);
        controls.update(); // Actualiza los controles de órbita
        renderer.render(scene, camera);
    }
    animate();
});
</script>

