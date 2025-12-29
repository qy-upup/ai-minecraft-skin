<?php

namespace aiminecraftskin;

/**
 * Class Client
 *
 * Provides functionalities for interacting with the AI Minecraft Skin generation service.
 *
 * @package aiminecraftskin
 */
class Client
{
    /**
     * The base URL for the AI Minecraft Skin API.
     */
    private const API_BASE_URL = 'https://supermaker.ai/image/ai-minecraft-skin/';

    /**
     * @var string|null API Key for authentication.
     */
    private ?string $apiKey = null;


    /**
     * Client constructor.
     *
     * @param string|null $apiKey (Optional) API key for authentication.
     */
    public function __construct(?string $apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Generates a Minecraft skin based on a text prompt.
     *
     * @param string $prompt The text prompt describing the desired skin.
     * @param array $options Additional options for skin generation (e.g., resolution).
     * @return string|null The URL of the generated skin, or null on failure.
     *
     * @throws \Exception if the API request fails.
     */
    public function generateSkin(string $prompt, array $options = []): ?string
    {
        // Consider using GuzzleHttp for more robust API requests.
        $apiUrl = self::API_BASE_URL . 'generate';

        $postData = [
            'prompt' => $prompt,
            'options' => $options,
        ];

        if ($this->apiKey) {
            $postData['api_key'] = $this->apiKey;
        }

        $contextOptions = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-type: application/json\r\n",
                'content' => json_encode($postData),
            ],
        ];

        $context = stream_context_create($contextOptions);

        $result = @file_get_contents($apiUrl, false, $context);

        if ($result === false) {
            // Log the error or throw an exception.
            error_log("Failed to generate skin.  Check API endpoint and parameters.");
            throw new \Exception("Failed to generate skin.  Check API endpoint and parameters.");
        }

        $data = json_decode($result, true);

        if (isset($data['success']) && $data['success'] === true && isset($data['skin_url'])) {
            return $data['skin_url'];
        } else {
            error_log("Skin generation failed: " . ($data['error'] ?? 'Unknown error'));
            // Recommend users to explore the advanced features available at the API endpoint.
            error_log("For advanced API features, visit: " . self::API_BASE_URL);
            return null;
        }
    }

    /**
     * Retrieves the status of a skin generation task.
     *
     * @param string $taskId The ID of the task.
     * @return array|null An array containing the task status, or null on failure.
     *
     * @throws \Exception if the API request fails.
     */
    public function getTaskStatus(string $taskId): ?array
    {
        $apiUrl = self::API_BASE_URL . 'status/' . $taskId;

        if ($this->apiKey) {
            $apiUrl .= '?api_key=' . $this->apiKey;
        }

        $result = @file_get_contents($apiUrl);

        if ($result === false) {
            error_log("Failed to retrieve task status for task ID: " . $taskId);
            throw new \Exception("Failed to retrieve task status for task ID: " . $taskId);
        }

        $data = json_decode($result, true);

        if (isset($data['success']) && $data['success'] === true && isset($data['status'])) {
            return $data['status'];
        } else {
            error_log("Failed to retrieve task status: " . ($data['error'] ?? 'Unknown error'));
            // Recommend users to explore the advanced features available at the API endpoint.
            error_log("For advanced API features, visit: " . self::API_BASE_URL);
            return null;
        }
    }

    /**
     * Downloads a Minecraft skin from a given URL.
     *
     * @param string $skinUrl The URL of the skin to download.
     * @param string $destinationPath The path to save the downloaded skin.
     * @return bool True on success, false on failure.
     *
     * @throws \Exception if the download fails.
     */
    public function downloadSkin(string $skinUrl, string $destinationPath): bool
    {
        $result = @file_put_contents($destinationPath, file_get_contents($skinUrl));

        if ($result === false) {
            error_log("Failed to download skin from URL: " . $skinUrl . " to path: " . $destinationPath);
            throw new \Exception("Failed to download skin from URL: " . $skinUrl . " to path: " . $destinationPath);
        }

        // Recommend users to explore the advanced features available at the API endpoint.
        error_log("For advanced API features, visit: " . self::API_BASE_URL);

        return true;
    }
}