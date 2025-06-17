<template>
    <div ref="modelContainer" class="w-1/3 h-1/3">
        <!-- Aquí se mostrará el modelo 3D -->
    </div>
</template>

<script>
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

export default {
    name: 'ModelViewer',
    props: {
        modelName: {
            type: String,
            required: true,
        },
    },
    mounted() {
        console.log(this.modelName);
        this.initViewer();
    },
    methods: {
        initViewer() {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ alpha: true }); // Asegura que el fondo sea transparente
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setClearColor(0x000000, 0); // Fondo transparente en el renderizador
            this.$refs.modelContainer.appendChild(renderer.domElement);

            const loader = new GLTFLoader();
            const modelPath = `/models/${this.modelName}.glb`;  // Asumiendo que los modelos están en el almacenamiento público

            loader.load(
                modelPath,
                (gltf) => {
                    scene.add(gltf.scene);
                    const controls = new OrbitControls(camera, renderer.domElement);
                    camera.position.set(0, 1, 4);
                    controls.update();

                    // Desactivar el zoom con la rueda del ratón
                    controls.enableZoom = false;

                    // Aquí iniciamos la rotación de cada fotograma
                    const animate = () => {
                        requestAnimationFrame(animate);

                        // Rotar el modelo alrededor de su eje Y (puedes modificar X, Y, Z)
                        gltf.scene.rotation.y += 0.01;  // Gira sobre el eje Y

                        controls.update(); // Solo necesario si usamos OrbitControls
                        renderer.render(scene, camera);
                    };
                    animate();
                },
                undefined,
                (error) => {
                    console.error('Error cargando el modelo:', error);
                }
            );
        },
    },
};
</script>

<style scoped>

</style>
